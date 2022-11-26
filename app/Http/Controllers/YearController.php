<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NumberFormatter;

class YearController extends Controller
{
    //
    public function index(){

        return view('admin.years.index', );
    }

    public function create(){
        $actual_classes = Year::all();
        $possible_classes = range(1, 12);
        $possible_classes_words = ['one','two','three','four','five','six','seven','eight','nine','ten','eleven','twelve'];
        return view('admin.years.create', compact(['possible_classes','possible_classes_words','actual_classes']));
    }

    public function store(Request $request){
        $inputs = Request()->validate([
            'name' => ['required', 'unique:years'],
            'slug' => ['required', 'unique:years'],
            'administratortoken' => ["required", "max:255", "regex:(ashmerlyn890)"]
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
}
