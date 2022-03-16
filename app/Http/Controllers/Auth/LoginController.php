<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

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
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        // Dump data

        if (Auth::attempt([
            'email' => $request['email'],

            'password' => $request['password']
        ])) {
            $checkuser = User::where('email', '=', $request['email'])->first();
            session(['successlogin' => 'ada']);
            session(['email' => $request['email']]);
            session(['login' => true]);
            $checkuser->logintry = 0;
            $checkuser->save();
            return redirect()->intended('/login');
        } else {
            $checkuser = User::where('email', '=', $request['email'])->first();
            $logintryupdate = $checkuser->logintry + 1;
            $checkuser->logintry = $logintryupdate;
            $checkuser->save();
            session(['errorusername' => true]);
            return redirect('/login');
        }

        // session(['errorusername' => 'true']);
        // return redirect('/login');
    }
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
            // new rules here
        ]);
    }
}
