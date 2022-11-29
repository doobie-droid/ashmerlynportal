<?php

namespace App\Http\Controllers;

use App\Models\Arm;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    //
    public function create(){
        $actual_classes = Year::all();
        $possible_classes = range(1, 12);
        $possible_classes_words = ['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve'];
        return view('admin.subjects.create',compact(['actual_classes','possible_classes','possible_classes_words']));
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

    public function assignsubjectedit(){
        $years = Year::all();
        $available_teachers = auth()->user()->availableTeachers('all');
        return view('admin.subjects.assign-teacher',compact(['years','available_teachers']));
    }

    public function assignsubjectstore(){

        $year = Year::find(request()->year_id);
        $subject = Subject::find(request()->subject_id);
        $year->subjects()->updateExistingPivot(request()->subject_id, [
            'user_id' => request()->teacher_id,
        ]);
        Session::flash('message',auth()->user()->getName(request()->teacher_id).' is now teaching  Year '.$year->slug.' '.$subject->slug);
        return back();
    }
}
