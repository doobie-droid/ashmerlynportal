<?php

namespace App\Http\Controllers;

use App\Models\Arm;
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
        return view('admin.arms.assign-teacher');
    }

    public function assignclassstore(){
        return view('admin.arms.assign-teacher');
    }

}
