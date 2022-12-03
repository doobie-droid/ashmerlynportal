<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function exam_show(){
        return view('student.exam-index');
    }

    public function midterm_show(){
        return view('student.midterm-index');
    }
}
