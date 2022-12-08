<?php

namespace App\Http\Controllers;

use App\Models\Arm;
use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use NumberFormatter;

class YearController extends Controller
{
    //

    public function armindex($year_id){
        if($year_id == 'empty'){
            $year_id = Year::orderBy('created_at', 'asc')->first()->id;
        }
        $years = Year::orderBy('name','asc')->get();
        $arms = Arm::orderBy('id','asc')->get();
        return view ('admin.years.armindex', compact(['years','year_id','arms']));
    }


    public function create(){
        $actual_classes = Year::orderBy('name','asc')->get();
        $possible_classes = range(1, 12);
        $possible_classes_words = ['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve'];
        $subjects = Subject::all();
        return view('admin.years.create', compact(['possible_classes','possible_classes_words','actual_classes','subjects']));
    }

    public function store(Request $request){
        $admin_token = env('ADMIN_TOKEN');
        $inputs = Request()->validate([
            'name' => ['required', 'unique:years'],
            'slug' => ['required', 'unique:years'],
            'administratortoken' => ["required", "max:255", "regex:($admin_token)"]
        ]);
        $possible_classes_words = ['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve'];
        //trying to check if the value of the class matches in words and digits
        if($inputs['slug']== $possible_classes_words[intval($inputs['name']) - 1]){
            Year::create($inputs);
            Session::flash('success_message', 'A new class has just been successfully created');
        }else{
            Session::flash('error_message', 'Your class in digits did not match your class in words');
        }
        return back();


    }

    public function subjectattach(Year $year){
        $subject = Subject::find(request()->id);
        $year->subjects()->attach($subject);
        Session::flash('success_message', $subject->name.' has been added to Year '.$year->slug);
        return back();
    }

    public function subjectdetach(Year $year){
        $subject = Subject::find(request()->id);
        $year->subjects()->detach($subject);
        Session::flash('error_message', $subject->name.' has been removed from  Year '.$year->slug);
        return back();
    }

    public function armattach(){
        $arm = Arm::find(request()->arm_id);
        $year = Year::find(request()->class_id);
        $year->arms()->attach($arm);
        Session::flash('success_message', $arm->name.' has been added to Year '.$year->slug);
        return back();
    }

    public function armdetach(){
        $arm = Arm::find(request()->arm_id);
        $year = Year::find(request()->class_id);
        $year->arms()->detach($arm);
        Session::flash('error_message', $arm->name.' has been removed from  Year '.$year->slug);
        return back();
    }

    public function showclassprofile(Year $year, Arm $arm){
        $this->authorize('adminAuth',User::class);
        $student_role = Role::where('slug','student')->get()->first();
        $teacher_details = DB::table('arm_year')->where('year_id',$year->id)->where('arm_id',$arm->id)->get()->first();
        return view('admin.years.classprofile' ,compact(['year','arm','student_role','teacher_details']));
    }


}
