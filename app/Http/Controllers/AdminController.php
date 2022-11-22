<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (!auth::user()->userHasRole('administrator')) {
            return view('admin.users.admin-password-edit', compact('user'));
        } else {
            abort(401);
        }


    }

    public function passwordupdate(User $user)
    {

        if (!auth::user()->userHasRole('administrator')) {
            if($user->userHasRole('student')){
                $inputs = Request()->validate([
                    'password' => ['required', 'string', 'confirmed', 'min:6'],
                ]);

            }else{
                $inputs = Request()->validate([
                    'password' => ['required', 'string', 'confirmed', Password::min(8)
                        ->symbols()
                        ->uncompromised()],
                ]);
            }
        } else {
            abort(401);
        }
        User::where('id', $user->id)->update(['password' => Hash::make($inputs['password'])]);
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
