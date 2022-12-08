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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
    public function edit(User $user, Year $year, Subject $subject)
    {
        //
        $this->authorize("view", $user);
        $is_authorized = DB::table('subject_year')
            ->where('user_id', $user->id)
            ->where('year_id', $year->id)
            ->where('subject_id', $subject->id)
            ->get()
            ->first();
        if ($is_authorized) {
            $detail = Detail::find(1);
            $teacher_role = Role::where('slug', 'teacher')->get()->first();
            $student_role = Role::where('slug', 'student')->get()->first();
            return view('staff.scores.edit', compact(['student_role', 'teacher_role', 'detail', 'year', 'subject']));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->authorize("teacherAuth", User::class);
        $detail = Detail::find(1);
        $teacher_id = auth()->user()->id;
        $inputs = request()->validate([
            'score_1' => ['required', 'numeric', 'max:'.$detail->small_value, 'min:0'],
            'score_2' => ['required', 'numeric', 'max:'.$detail->small_value, 'min:0'],
            'score_3' => ['required', 'numeric', 'max:'.$detail->large_value, 'min:0'],
        ]);
        $record = User::find(request()->user_id)->singleSubjectScore(request()->subject_id)->get()->last();

        if ($record) {
            $score = Score::find($record->id);
            $score->score_1 = request()->score_1;
            $score->score_2 = request()->score_2;
            $score->score_3 = request()->score_3;
            $score->score_total = request()->score_1 + request()->score_2 + request()->score_3;
            $score->teacher_id = $teacher_id;
            $score->save();
            Session::flash('info-message', 'The changes made for ' . auth()->user()->getName(request()->user_id) . ' has been recorded');
        } else {
            Score::create([
                'user_id' => request()->user_id,
                'year_id' => request()->year_id,
                'subject_id' => request()->subject_id,
                'arm_id' => request()->arm_id,
                'exam' => $detail->exam,
                'score_1' => request()->score_1,
                'score_2' => request()->score_2,
                'score_3' => request()->score_3,
                'score_total' => request()->score_1 + request()->score_2 + request()->score_3,
                'entry_year' => $detail->entry_year,
                'term' => $detail->term,
                'teacher_id' => $teacher_id

            ]);
            Session::flash('success-message', 'You entered input for ' . auth()->user()->getName(request()->user_id) . ' has been recorded');


        }
        return back();
    }

    public function form_teacher_edit(User $user)
    {
        $this->authorize('view', $user);
        $students = Role::where('slug', 'student')
            ->with('users', function ($query) {
                $query->where('status', 1);
            })->get()->first()->users->where('year_id', $user->year_id)->where('arm_id', $user->arm_id)->sortBy('surname') ;
        $columns = Schema::getColumnListing('aptitudes');
        return view('staff.form-teacher.edit', compact(['students', 'user','columns']));
    }

    public function form_teacher_update(User $user)
    {
        $this->authorize('view', $user);
        return request();
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
