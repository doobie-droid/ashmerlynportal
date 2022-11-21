<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index',compact(['roles']));
    }
    public function create(){
        return view('admin.roles.create');
    }
    public function store(Request $request){
        $inputs = Request()->validate([
            'name'=>['required','string','unique:roles'],
            'administratortoken'=> ["required" , "max:255", "regex:(ashmerlyn890)"]
        ]);
        $data['name'] = Str::ucfirst($inputs['name'] );
        $data['slug'] = Str::of(Str::lower($inputs['name']))->slug('-');
        Role::create($data);
        Session::flash('record_created', 'Your request has been successfully created');
        return back();
    }

}
