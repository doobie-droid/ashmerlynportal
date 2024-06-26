<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $admin_token = config('app.admin_token');
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255','unique:users'],
            'firstname'=> ['required','string','max:255'],
            'middlename'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'email' =>  'nullable|email|max:255|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender'=>['required'],
            'administratortoken' => ["required" , "max:255", "regex:($admin_token)"]
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

        $user =  User::create([
            'username' => Str::lower($data['username']),
            'firstname' => Str::ucfirst($data['firstname']),
            'middlename' => Str::ucfirst($data['middlename']),
            'surname' => Str::ucfirst($data['surname']),
            'email' => $data['email'],
            'gender'=>$data['gender'],
            'password' => Hash::make($data['password']),
        ]);
        
        return $user;
    }
}
