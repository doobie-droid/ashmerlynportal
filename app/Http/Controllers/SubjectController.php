<?php

namespace App\Http\Controllers;

use App\Models\Arm;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    //
    public function create(){
        return view('admin.subjects.create');
    }

    public function store(Request $request){
        $inputs = Request()->validate([
            'name' => ['required', 'unique:subjects'],
            'password' => 'current_password',
        ]);
        $inputs['name']= Str::ucfirst( Str::lower($inputs['name']));
        $inputs['slug'] = Str::of(Str::lower($inputs['name']))->slug('-');
        Subject::create($inputs);
        Session::flash('success_message', 'A new subject has just been successfully added');
        return back();
    }
}
