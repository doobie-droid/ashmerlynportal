<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $users = User::where('id','!=',Auth::id())->orderBy('created_at','DESC')->paginate(5);
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
            'avatar'=>'file|mimes:jpg,png|',
            'phone_number'=> 'nullable|size:11',
            'date_of_birth'=>'nullable|date',
            'gender'=>['required'],
            'roles'=> ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if(request('avatar')){
            $inputs['avatar']=request('avatar')->store('images');
        }
        $user = User::create([
            'username' => Str::lower($inputs['username']),
            'firstname' => Str::ucfirst( Str::lower($inputs['firstname'])),
            'middlename' => Str::ucfirst( Str::lower($inputs['middlename'])),
            'surname' => Str::ucfirst( Str::lower($inputs['surname'])),
            'email' => $inputs['email'],
            'phone_number'=>$inputs['phone_number'],
            'gender'=>$inputs['gender'],
            'date_of_birth'=>$inputs['date_of_birth'],
            'avatar'=>$inputs['avatar'],
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
    public function show(Request $request)
    {
        //
        $users = DB::table('users')
            ->where("firstname", "LIKE", "%".$request['query']."%")
            ->orWhere("middlename", "LIKE", "%".$request['query']."%")
            ->orWhere("surname", "LIKE", "%".$request['query']."%")
            ->orderBy('created_at','DESC')->paginate(5);

        return view('admin.users.index',compact(['users']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return view('admin.users.edit',compact('user'));
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
        return $request;
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
