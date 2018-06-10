<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;


    public function reset(Request $request)
    {
        $validatedData = \Validator::make($this->credentials($request), $this->rules(), $this->messages());

        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }

        try {
            $response = $this->broker()->reset(
                $this->credentials($request), function ($user, $password) {
                    $this->resetPassword($user, $password);
                }
            );
            
        } catch (\Exception $exception) {
            logger()->error($exception);
            return response()->json(['error' => 'No se ha podido cambiar la contraseña']);
        }
    }
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => str_random(60),
        ])->save();
 
        // GENERAR TOKEN PARA SATELLIZER AQUI ??
        // $this->guard()->login($user);
    }
    protected function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
    protected function messages()
    {
        return [
            'email.required' => 'Email es requerido.',
            'email.email' => 'Debe introducir un email.',
            'email.exists' => 'El email introducido no existe en nuestra web.',
            'email.email' => 'El email no tiene un formato valido.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña no puede ser menor de 6 caracteres.',
            'password_confirmation.required' => 'Confirmar la  contraseña es requerido.',
            'confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
