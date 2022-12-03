<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function exam_show()
    {
        $scores = auth()->user()->examScores;
        $details = Detail::find(1);
        return view('student.exam-index', compact(['scores','details']));
    }

    public function midterm_show()
    {
        return view('student.midterm-index');
    }
}
