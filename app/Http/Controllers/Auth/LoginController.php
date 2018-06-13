<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Check either username or email.
     * @return string
     */
    protected function login(Request $request)
    {
        $validatedData = \Validator::make($request->all(),  $this->rules(), $this->messages());

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }

        try {
            $field = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $data = $request->only('password');
            $data = data_set($data, $field, $_POST['identity']);
            $data = data_set($data, 'status', 1);
            $remember = true;
            $user = User::where($field, $request->identity)->first();
            
            if (!$user) {
                return response()->json(['error' => 'El email o el usuario no coinciden con ningun usuario de nuestra web, lo sentimos.']);
            } else if ($user->status !=1) {
                return response()->json(['error' => 'El usuario con el que intentas acceder aun no ha activado su cuenta, lo sentimos.']);
            } else if (!Auth::attempt($data, $remember)) {
                return response()->json(['error' => 'No coincide la contraseña con el usuario de nuestra web, lo sentimos.']);
            }
        } catch (\Exception $exception) {
            logger()->error($exception);
            $code = $exception->getCode();
            return response()->json(['error' => 'Hemos tenido un problema con nuestro servidor, vuelva a intentarlo mas tarde.']);
        }
    }

    protected function rules()
    {
        return [
            'identity' => 'required',
            'password' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'identity.required' => 'Debes introducir un email o nombre de usuario.',
            'password.required' => 'La contraseña es requerida.',
        ];
    }
}
