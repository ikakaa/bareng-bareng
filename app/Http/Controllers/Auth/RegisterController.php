<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\phonenumRule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonenum' => ['required', 'string', 'min:12', new phonenumRule()],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //Insert Register
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phonenum' => $data['phonenum'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function register(Request $request){
            //Register
            $checkemail = User::where('email', '=', request('email'))->first();
            //Check if email exist, return to register with error msg
            if ($checkemail != NULL) {
                session(['erroremail' => true]);
                return redirect('/register');
            }
            //IF Email not exist, insert
            else {
                $user = new User();
                $user->name = request('name');
                $user->email = request('email');
                $user->phonenum = request('phonenum');
                $user->password=Hash::make(request('password'));
                session(['successregister' => 'ada']);
                $user->save();
                return redirect('/register');
            }
    }
}
