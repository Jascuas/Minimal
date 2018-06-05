<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
    public function login1(Request $request)
    {
        $field = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$field => $request->identity]);
        $data = $request->only($field, 'password');
        $data = data_set($data, 'status', 1);
        @info($data);
        if (auth()->attempt($data)) {
            @info(auth()->attempt($data));
            return redirect('/home');
        }
        return redirect('login')->withErrors([
            'error' => 'These credentials do not match our records.',
        ]);
    }
    protected function login(Request $request)
    {
        header('Content-Type: application/json');
        $rules = [
            'identity' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'identity.required' => 'Debes introducir un email o nombre de usuario.',
            'password.required' => 'La contraseña es requerida.',
        ];
        $validatedData = \Validator::make($request->all(), $rules, $messages);

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }

        try {
            $field = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $request->merge([$field => $request->identity]);
            $data = $request->only($field, 'password');
            $data = data_set($data, 'status', 1);
            if (!auth()->attempt($data)) {
                return response()->json(['error' => 'No coinciden las credenciales con ningun usuario de nuestra web, lo sentimos.']);
            }

        } catch (\Exception $exception) {
            logger()->error($exception);
            $code = $exception->getCode();
            return response()->json(['error' => 'Hemos tenido un problema con nuestro servidor, vuelva a intentarlo mas tarde.']);
        }
    }
    /**
     * Validate the user login.
     * @param Request $request
     */

}
