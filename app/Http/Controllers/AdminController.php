<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Arm;
use App\Models\Detail;
use App\Models\Role;
use App\Models\User;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
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
    public function passwordedit(User $user)
    {
        $this->authorize('adminAuth', User::class);
        return view('admin.users.admin-password-edit', compact('user'));


    }

    public function passwordupdate(User $user)
    {
        $this->authorize('adminAuth', User::class);
        if ($user->userHasRole('administrator')) {
            $inputs = Request()->validate([
                'password' => ['required', 'string', 'confirmed', Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
            ]);
        } elseif ($user->userHasRole('teacher')) {
            $inputs = Request()->validate([
                'password' => ['required', 'string', 'confirmed', Password::min(8)
                    ->mixedCase()
                    ->uncompromised()],
            ]);
        } else {
            $inputs = Request()->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

        }
        User::where('id', $user->id)->update(['password' => Hash::make($inputs['password'])]);
        Activity::create([
            'type'=>'password',
            'action'=> auth::user()->surname.' '.auth::user()->firstname.' just changed the password for '.$user->surname.' '.$user->firstname.' at '.Carbon::now()
        ]);
        Session::flash('password_updated', 'Your password has been successfully changed');
        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function roleattach(User $user){
        $validation_passed = true;
        if($user->roles->contains(Role::where('slug','student')->get()->first())){
            Session::flash('error_message', 'Error! Students such as '.$user->surname.' '.$user->firstname.' can only have one role');
            $validation_passed= false;
        }
        if($user->roles->isNotEmpty() && Role::find(request()->role_id)->slug == 'student' ){
            Session::flash('error_message', 'Error! Users like '.$user->surname.' '.$user->firstname.' who have other roles cannot be assigned as students');
            $validation_passed= false;
        }
        if(count(DB::table('role_user')->where('role_id',1)->get()) >= 2 && Role::find(request()->role_id)->slug == 'administrator'  ){
            Session::flash('error_message', 'Sorry! There can be only two admins at a moment, deactivate the other admin or remove his admin status');
            $validation_passed= false;
        }
        if ($validation_passed){
            $role = Role::find(request()->role_id);
            $user->roles()->attach($role);
            Session::flash('role_attach', $role->name.' has been added to '.$user->surname.' '.$user->firstname);
        }
        return back();
    }

    public function roledetach(User $user){
        $role = Role::find(request()->role_id);
        $user->roles()->detach($role);
        Session::flash('role_detach', $role->name.' has been removed from '.$user->surname.' '.$user->firstname);
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function app_setting_view(){
        $details = Detail::find(1);
        return view('admin.settings.index',compact(['details']));
    }

    public function showresult (){
        $details = Detail::find(1);
        if(request()->show_result == 1){
            $details->show_result = '0';

        }else{
            $details->show_result = '1';
        }
        $details->save();
        return back();
    }
    public function togglemode (){
        $details = Detail::find(1);
        if(request()->exam == 1){
            $details->exam = '1';
            $details->small_value = 20;
            $details->large_value = 60;
        }else{
            $details->exam = '0';
            $details->small_value = 5;
            $details->large_value = 10;
        }
        $details->save();
        return back();
    }
    public function changeterm (){

        $details = Detail::find(1);
        $details->term = request()->term;
        $details->save();
        return back();
    }
    public function changeyear (){
        $details = Detail::find(1);
        $details->entry_year = request()->entry_year;
        $details->save();
        return back();
    }

    public function student_arm_edit(Year $year){
        $students=  Role::where('slug', 'student')
            ->with('users', function ($query) {
                $query->where('status', 1);
            })->get()->first()->users->where('year_id',$year->id);
        return view('admin.years.assign-student-arm',compact(['year','students']));
    }
    public function student_arm_update(Year $year){
        $student = User::find(request()->user_id);
        foreach($student->examScores as $score){
            $score->arm_id = request()->arm_id;
            $score->save();
        }
        $student->arm_id = request()->arm_id;
        $student->save();
        Session::flash('message',$student->surname.' '.$student->firstname.' is now in Year '.$year->slug.' '.Arm::find(request()->arm_id)->name);
        return back();
    }
    public function destroy($id)
    {
        //
    }
}
