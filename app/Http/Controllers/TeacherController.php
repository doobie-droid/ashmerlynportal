<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Detail;
use App\Models\Role;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
//         return User::find(2)->singlesubjectScore(2)->get();
        $this->authorize("view", $user);
        $classes = Year::all();
        $detail = Detail::find(1);
        $teacher_role = Role::where('slug', 'teacher')->get()->first();
        $student_role = Role::where('slug', 'student')->get()->first();
        return view('staff.scores.edit', compact(['classes', 'student_role', 'teacher_role', 'detail']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->authorize("teacherAuth", User::class);
        $detail = Detail::find(1);
        //

        if (request()->score_1 < $detail->small_value && request()->score_1 > 0 &&
            request()->score_2 < $detail->small_value && request()->score_2 > 0 &&
            request()->score_2 < $detail->large_value && request()->score_2 > 0) {

            $validation_passed = true;
        } else {
            Session::flash('error-message', 'Fill all the fields for ' . auth()->user()->getName(request()->user_id) . ' properly. Invalid Input!');
            $validation_passed = false;

        }
        if ($validation_passed) {
            $record = User::find(request()->user_id)->singleSubjectScore(request()->subject_id)->get()->last();
            if ($record) {
                $score = Score::find($record->id);
                $score->score_1 = request()->score_1;
                $score->score_2 = request()->score_2;
                $score->score_3 = request()->score_3;
                $score->save();
                Session::flash('info-message', 'The changes made for ' . auth()->user()->getName(request()->user_id) . ' has been recorded');
            } else {
                Score::create([
                    'user_id' => request()->user_id,
                    'year_id' => request()->year_id,
                    'subject_id' => request()->subject_id,
                    'exam' => $detail->exam,
                    'score_1' => request()->score_1,
                    'score_2' => request()->score_2,
                    'score_3' => request()->score_3,
                    'entry_year' => $detail->entry_year,
                    'term' => $detail->term,
                    'teacher_id' => auth()->user()->id

                ]);
                Session::flash('success-message', 'You entered input for ' . auth()->user()->getName(request()->user_id) . ' has been recorded');
            }


        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
