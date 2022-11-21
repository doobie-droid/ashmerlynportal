<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users =User::all()->except(Auth::id());

        return view('admin.users.index',compact(['users']));
    }

    public function activeindex(){
        return view("admin.users.active-index");
    }

    public function deactivatedindex(){
        return view('admin.users.deactivated-index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles =  Role::where('name','!=','Administrator')->get();

        return view('admin.users.create',compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = Request()->validate([
            'username' => ['required', 'string', 'max:255','unique:users'],
            'firstname'=> ['required','string','max:255'],
            'middlename'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'email' =>  'nullable|email|max:255|unique:users',
            'roles'=> ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::create([
            'username' => Str::lower($inputs['username']),
            'firstname' => Str::ucfirst( Str::lower($inputs['firstname'])),
            'middlename' => Str::ucfirst( Str::lower($inputs['middlename'])),
            'surname' => Str::ucfirst( Str::lower($inputs['surname'])),
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
       ]);
        if($inputs['roles']){
            $user->roles()->attach(Role::find($inputs['roles']));
            Session::flash('record_created', 'Your user has been successfully created and the role assigned');
        } else{
            Session::flash('record_created', 'Your user has been successfully created without a role');
        }
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}