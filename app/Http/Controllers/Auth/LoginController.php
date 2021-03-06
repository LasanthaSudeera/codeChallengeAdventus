<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserLoggedIn;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($this->guard()->validate($this->credentials($request))) {
            if (Auth::guard('web')->attempt(array($fieldType => $input['email'], 'password' => $input['password'], 'is_active' => 1))) {
                event(new UserLoggedIn(Auth::user()));
                return redirect()->route('home');
            } else {
                $this->incrementLoginAttempts($request);

                $errors = new MessageBag(['email' => ['This account has been banned.']]);
                return redirect()->route('login')->withErrors($errors)->withInput($request->except('password'));
            }
        } else {
            // dd('ok');
            $errors = new MessageBag(['email' => ['Credentials do not match our database.']]);
            return redirect()->route('login')->withErrors($errors)->withInput($request->except('password'));
            $this->incrementLoginAttempts($request);
        }
    }

    private function credentials(Request $request)
    {

        $type =  filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($type == 'email') {
            return $request->only($this->username(), 'password');
        } else {
            return [
                'username' => $request->email,
                'password' => $request->password
            ];
        }
    }
}
