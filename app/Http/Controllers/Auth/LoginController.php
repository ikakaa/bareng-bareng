<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Validation\Rule;
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
        // $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        //deklarasi variable
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        // Attempt Login with credentials

        if (Auth::attempt([
            'email' => $request['email'],

            'password' => $request['password']
        ])) {
            $checkuser = User::where('email', '=', $request['email'])->first();
            // IF Credential correct, check user logintry
            // IF logintry more than 3, redirect user to login with error msg
            if ($checkuser->logintry > 3) {
                session(['errorlogintry' => true]);
                return redirect('/login');
                exit;
            }
            // IF Login try less than 3, add session login and email then redirect to (?)
            session(['successlogin' => 'ada']);
            session(['email' => $request['email']]);
            session(['login' => true]);
            $checkuser->logintry = 0;
            $checkuser->save();
            return redirect()->intended('/home');
        } else {
            //IF Credential incorrect, Add login try +1 to the username, redirect to login with error msg
            $checkuser = User::where('email', '=', $request['email'])->first();
            if (isset($checkuser->email)) {
                $logintryupdate = $checkuser->logintry + 1;
                $checkuser->logintry = $logintryupdate;
                $checkuser->save();
            }

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
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    public function editprofile()
    {
        $ambildata = User::where('email', session('email'))->first();

        return view('editprofile', compact('ambildata'));
    }
    public function do_editprofile(Request $request)
    {
        $user=Auth::user();
            $request->validate([
            'file' => 'max:100000|mimes:jpeg,jpg,png,gif',
            // 'name' => ['required', 'string', 'min:5', 'max:255', 'unique:users', Rule::unique('users')->ignore($user->id)],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users',Rule::unique('users')->ignore($user->id)],
            'phonenum' => ['required', 'string', 'min:12'],

        ]);

        $ambildata = User::where('email', session('email'))->first();
        // $ambildata->email = $request->email;
        // $ambildata->name = $_POST['name'];
        $ambildata->phonenum = $_POST['phonenum'];

        if ($_FILES['file']['size']>0) {
            $tgl      = date('Ymd_H_i_s');
            $file = $_FILES['file']['tmp_name'];
            $image = $_FILES['file']['name'];
            $upload_path = 'profilepictures/';
            $upload_file = $upload_path . $tgl . $image;
            move_uploaded_file($file, $upload_file);
            $ambildata->profilepicture = $upload_file;
        }
        $ambildata->save();
        // session(['email' => $request['email']]);
        session(['successupload' => true]);
        return redirect()->back()->with('status', 'Product Added Successfully');
    }
}
