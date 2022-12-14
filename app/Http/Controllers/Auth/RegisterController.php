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
        $admin_token = env('ADMIN_TOKEN');
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
        if( count(User::all())==1){
            $data = [
                ['name'=>'Administrator', 'slug'=> 'administrator'],
                ['name'=>'Student', 'slug'=> 'student'],
                ['name'=>'Teacher', 'slug'=> 'teacher'],
                ['name'=>'Parent', 'slug'=> 'parent'],
            ];
            foreach($data as $datum){
                Role::create($datum);
            }

            $user->roles()->attach(Role::find(1));
            $user->roles()->attach(Role::find(3));
            Detail::create([
                'exam'=>'1',
                'term'=>'1',
                'small_value'=>20,
                'large_value'=>60,
                'entry_year'=>now()->year,
                'show_result'=>'1',
                'show_all_result'=>'1'

            ]);
        };
        return $user;
    }
}
