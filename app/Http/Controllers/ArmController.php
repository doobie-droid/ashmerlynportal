<?php

namespace App\Http\Controllers;

use App\Models\Arm;
use App\Models\Role;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ArmController extends Controller
{
    //

    public function create(){
        return redirect( route('class.create'));
    }
    public function store(Request $request){
        $inputs = Request()->validate([
            'name' => ['required', 'unique:arms'],
            'password' => 'current_password',
        ]);
        $inputs['name']= Str::ucfirst( Str::lower($inputs['name']));
        $inputs['slug'] = Str::of(Str::lower($inputs['name']))->slug('-');
        Arm::create($inputs);
        Session::flash('success_message', 'A new arm has just been successfully created');
        return back();
    }

    public function edit(){
        return view('admin.arms.edit');
    }

    public function update(){}

    public function assignclassedit(){
        $years = Year::all();
//        $teachers =  Role::where('slug','teacher')
//            ->with('users',function ($query){
//                $query->where('status',1);
//            })->get()->first()->users;
//        return $teachers;

        return view('admin.arms.assign-teacher',compact(['years']));
    }

    public function assignclassstore(){
        return request();
        return view('admin.arms.assign-teacher');
    }

}
