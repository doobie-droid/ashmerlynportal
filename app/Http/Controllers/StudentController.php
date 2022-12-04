<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function exam_show()
    {
        $scores = auth()->user()->examScores;
        $details = Detail::find(1);
        $user = auth()->user();
        return view('student.exam-index', compact(['scores','details','user']));
    }

//    public function exam_show()
//    {
//        $users = auth()->user()->year;
//        return $users;
//        return $objectProducts->avg('status');;
//
//        return view('student.exam-index', compact(['scores','details','user']));
//    }

    public function midterm_show()
    {
        return view('student.midterm-index');
    }
}
