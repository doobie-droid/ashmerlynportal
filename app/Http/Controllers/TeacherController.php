<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Subject;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $this->authorize("view",$user);
        $classes = Year::all();
        $teacher_role = Role::where('slug','teacher')->get()->first();
        $student_role = Role::where('slug','student')->get()->first();
        $is_exam = 1;
        $entry_year = 2022;
        $term = 1;
        if($is_exam == 1){
            $maximum1_2 = 20;
            $maximum3 = 60;
            $score_1_title = 'C.A. 1';
            $score_2_title = 'C.A. 2';
            $score_3_title = 'Examination';
        }else{
            $maximum1_2 = 5;
            $maximum3 = 10;
            $score_1_title = 'Assignment';
            $score_2_title = 'Classwork';
            $score_3_title = 'Test';
        }
        return view('staff.scores.edit',compact(['classes','student_role'
            ,'teacher_role','is_exam','entry_year','term','maximum1_2','maximum3',
            'score_1_title','score_2_title','score_3_title']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        return request();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
