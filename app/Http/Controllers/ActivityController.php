<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function index(){
        $pagination_number = 5;
        $password_activities = Activity::where('type','password')->orderBy('id', 'DESC')->paginate($pagination_number);
        $user_activities = Activity::where('type','user')->orderBy('id', 'DESC')->paginate($pagination_number);
        $role_activities  = Activity::where('type','role')->orderBy('id', 'DESC')->paginate($pagination_number);
        $destroy_activities = Activity::where('type','destroy')->orderBy('id', 'DESC')->paginate($pagination_number);
        return view('admin.activities.index',compact(['password_activities','user_activities','role_activities','destroy_activities']));
    }
}
