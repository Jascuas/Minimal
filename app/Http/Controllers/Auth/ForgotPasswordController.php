<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */
    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $validatedData = \Validator::make($request->only('email'), $this->rules(), $this->messages());
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        }
        try {
            $response = $this->broker()->sendResetLink($request->only('email'));
        } catch (\Exception $exception) {
            logger()->error($exception);
            $code = $exception->getCode();
            if ($code == 554) {
                return response()->json(['error' => 'No se ha podido enviar el email. Nuestro servidor de correo no esta disponible en estos momentos, por lo que no hemos podido enviarle el email de confimacion. Vuelva a intentarlo mas tarde']);
            } else {
                return response()->json(['error' => 'No se ha podido enviar el email.']);
            }
        }
    }

    protected function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',
        ];
    }
    protected function messages()
    {
        return [
            'email.required' => 'Email es requerido.',
            'email.email' => 'Debe introducir un email.',
            'email.exists' => 'El email introducido no existe en nuestra web.',
        ];
    }
}
