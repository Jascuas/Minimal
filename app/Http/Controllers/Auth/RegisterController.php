<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UserRegisteredSuccessfully;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
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
        header('Content-Type: application/json');
        $rules = [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre no puede superar 50 caracteres.',
            'name.string' => 'El nombre no puede contener caracteres especiales.',
            'email.required' => 'El email es requerido.',
            'email.max' => 'El email no puede superar 50 caracteres.',
            'email.email' => 'El email no tiene un formato valido.',
            'email.unique' => 'El email ya esta siendo usado en nuestra base de datos.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña no puede ser menor de 6 caracteres.',
            'password_confirmation.required' => 'Confirmar la  contraseña es requerido.',
            'confirmed' => 'Las contraseñas no coinciden.',
        ];
        $validatedData = \Validator::make($request->all(), $rules, $messages);

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }

        try {
            $Datos = $_POST;
            $Datos['password'] = bcrypt($Datos['password']);
            $Datos['activation_code'] = Str::random(20);
            $Datos['username'] = $Datos['email'];
            $user = app(User::class)->create($Datos);
            $user->notify(new UserRegisteredSuccessfully($user));

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
    // protected function register1(Request $request)
    // {
    //     /** @var User $user */
    // @info($request);
    // @info($_POST);
    // exit();
    //     $validatedData = $request->validate([
    //         'name'     => 'required|string|max:255',
    //         'email'    => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    //     try {
    //         $validatedData['password']        = bcrypt(array_get($validatedData, 'password'));
    //         $validatedData['activation_code'] = time();
    //         $validatedData['username'] = $request->email;
    //         $user                             = app(User::class)->create($validatedData);
    //     } catch (\Exception $exception) {
    //         logger()->error($exception);
    //         return redirect()->back()->withErrors([
    //             'error' => 'No se ha podido crear el usuario.',
    //         ]);
    //     }
    //     $user->notify(new UserRegisteredSuccessfully($user));
    //     return redirect()->back()->with('message', 'Usuario creado correctamente. Comprueba tu correo electronico para activar tu cuenta.(Puede estar en la bandeja de spam)');
    // }
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
}
