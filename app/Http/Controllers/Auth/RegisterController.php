<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UserRegisteredSuccessfully;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     */
    protected function register(Request $request)
    {
        $validatedData = \Validator::make($request->all(), $this->rules(), $this->messages());

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }

        try {

            $Datos = $_POST;
            $user = User::where('email', $Datos['email'])->first();
            if(!$user){
                $Datos['password'] = bcrypt($Datos['password']);
                $Datos['activation_code'] = Str::random(20);
                $Datos['username'] = $Datos['username'];
                $user = app(User::class)->create($Datos);
                $user->notify(new UserRegisteredSuccessfully($user));
            }  

        } catch (\Exception $exception) {
            logger()->error($exception);
            $user->delete();
            $code = $exception->getCode();
            if ($code == 554) {
                return response()->json(['error' => 'No se ha podido crear el usuario. Nuestro servidor de correo no esta disponible en estos momentos, por lo que no hemos podido enviarle el email de confimacion. Vuelva a intentarlo mas tarde']);
            } else {
                return response()->json(['error' => 'No se ha podido crear el usuario.']);
            }

        }
        return response()->json(['success']);
    }
    /**
     * Activate the user with given activation code.
     * @param string $activationCode
     * @return string
     */
    public function activateUser(string $activationCode)
    {
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return "El codigo no existe para ningun usuario registrado.";
            }
            $user->status = 1;
            $user->activation_code = null;
            $user->save();
            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.";
        }
        return redirect()->to('/home');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:10|unique:users',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre no puede superar 50 caracteres.',
            'name.string' => 'El nombre no puede contener caracteres especiales.',
            'username.required' => 'El nombre de usuario es requerido.',
            'username.max' => 'El nombre de usuario no puede superar 10 caracteres.',
            'username.string' => 'El nombre de usuario no puede contener caracteres especiales.',
            'username.unique' => 'El nombre de usuario ya esta siendo usado en nuestra base de datos.',
            'email.required' => 'El email es requerido.',
            'email.max' => 'El email no puede superar 50 caracteres.',
            'email.email' => 'El email no tiene un formato valido.',
            'email.unique' => 'El email ya esta siendo usado en nuestra base de datos.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña no puede ser menor de 6 caracteres.',
            'password_confirmation.required' => 'Confirmar la  contraseña es requerido.',
            'confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
