<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function index(){
        $number_of_recently = 5;

       $password_activities = Activity::where('type','password')->orderBy('id', 'DESC')->take($number_of_recently)->get();

        $user_activities = Activity::where('type','user')->orderBy('id', 'DESC')->take($number_of_recently)->get();
        $role_activities  = Activity::where('type','role')->orderBy('id', 'DESC')->take($number_of_recently)->get();
        $destroy_activities = Activity::where('type','destroy')->orderBy('id', 'DESC')->take($number_of_recently)->get();
        return view('admin.activities.index',compact(['password_activities','user_activities','role_activities','destroy_activities']));
    }

    public function show($type){
        $application_updates = Activity::where('type',$type)->orderBy('id', 'DESC')->paginate(15);
        return view('admin.activities.details',compact(['application_updates','type']));
    }
}


