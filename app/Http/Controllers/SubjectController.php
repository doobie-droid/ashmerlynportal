<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function create(){
        return view('admin.subjects.create');
    }

    public function store(){

    }
}
