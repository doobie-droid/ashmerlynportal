<?php

namespace App\Http\Controllers;

use App\Models\Arm;
use App\Models\Role;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ArmController extends Controller
{
    //

    public function create()
    {
        return redirect(route('class.create'));
    }

    public function store(Request $request)
    {
        $inputs = Request()->validate([
            'name' => ['required', 'unique:arms'],
            'password' => 'current_password',
        ]);
        $inputs['name'] = Str::ucfirst(Str::lower($inputs['name']));
        $inputs['slug'] = Str::of(Str::lower($inputs['name']))->slug('-');
        Arm::create($inputs);
        Session::flash('success_message', 'A new arm has just been successfully created');
        return back();
    }

    public function edit()
    {
        return view('admin.arms.edit');
    }

    public function update()
    {
    }

    public function assignclassedit()
    {
        $years = Year::all();
        $unavailable_teachers = [];
        $unavailable_teachers_collection = DB::table('arm_year')->whereNotNull('user_id')->select('user_id')->distinct()->get();
        foreach($unavailable_teachers_collection as $unavailable_teacher){
            $unavailable_teachers[] = $unavailable_teacher->user_id;
        }
        $available_teachers = Role::where('slug', 'teacher')
            ->with('users', function ($query) {
                $query->where('status', 1)->select('id', 'firstname', 'surname');
            })->get()->first()->users->whereNotIn('id', $unavailable_teachers);

        return view('admin.arms.assign-teacher', compact(['years', 'available_teachers']));
    }

    public function assignclassstore()
    {
        $year = Year::find(request()->year_id);
        $arm = Arm::find(request()->arm_id);
        $year->arms()->updateExistingPivot(request()->arm_id, [
            'user_id' => request()->teacher_id,
        ]);
        Session::flash('message', auth()->user()->getName(request()->teacher_id) . ' is now a seated teacher in Year ' . $year->slug . ' ' . $arm->slug);
        return back();
    }

}
