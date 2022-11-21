<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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

        return view('admin.users.index');
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
        return view('admin.users.create');
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'username' => Str::lower($inputs['username']),
            'firstname' => Str::ucfirst( Str::lower($inputs['firstname'])),
            'middlename' => Str::ucfirst( Str::lower($inputs['middlename'])),
            'surname' => Str::ucfirst( Str::lower($inputs['surname'])),
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
       ]);
        Session::flash('record_created', 'Your request has been successfully created');
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
