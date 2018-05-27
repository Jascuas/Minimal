<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Validation\ValidationException;
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
    public function rules()
{
    return [
       'identity' => 'required',
       'password' => 'required'
    ];
}
    public function login(Request $request)
{
    $field = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    $request->merge([$field => $request->identity]);


    if (auth()->attempt($request->only($field, 'password')))
    {
        return redirect('/');
    }


    return redirect('login')->withErrors([
        'error' => 'These credentials do not match our records.',
    ]);
}
    // public function username()
    // {
    //     $identity  = request()->get('identity');
    //     $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //     request()->merge([$fieldName => $identity]);
    //     return $fieldName;
    // }
    // protected function credentials(Request $request)
    // {
    //     $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
    //         ? $this->username()
    //         : 'username';
    //         @info($field);
    //     return [
    //         $field => $request->get($this->username()),
    //         'password' => $request->password,
    //     ];
    // }   


    /**
     * Validate the user login.
     * @param Request $request
     */
    // protected function validateLogin(Request $request)
    // {
    //     $this->validate(
    //         $request,
    //         [
    //             'identity' => 'required|string',
    //             'password_login' => 'required|string',
    //         ],
    //         [
    //             'identity.required' => 'Username or email is required',
    //             'password.required' => 'Password is required',
    //         ]
    //     );
    // }
    // /**
    //  * @param Request $request
    //  * @throws ValidationException
    //  */
    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $request->session()->put('login_error', trans('auth.failed'));
    //     throw ValidationException::withMessages(
    //         [
    //             'error' => [trans('auth.failed')],
    //         ]
    //     );
    // }
   
}