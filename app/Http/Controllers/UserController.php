<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('id', '!=', Auth::id())->orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.users.index', compact(['users']));
    }

    public function activeindex()
    {
        return view("admin.users.active-index");
    }

    public function deactivatedindex()
    {
        return view('admin.users.deactivated-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::where('name', '!=', 'Administrator')->get();

        return view('admin.users.create', compact(['roles']));
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
        $inputs = Request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => 'nullable|email|max:255|unique:users',
            'avatar' => 'nullable|file|mimes:jpg,png|',
            'phone_number' => 'nullable|size:11',
            'date_of_birth' => 'nullable|date',
            'gender' => ['required'],
            'roles' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }
        $inputs['username'] = Str::lower($inputs['username']);
        $inputs['firstname'] = Str::ucfirst(Str::lower($inputs['firstname']));
        $inputs['middlename'] = Str::ucfirst(Str::lower($inputs['middlename']));
        $inputs['surname'] = Str::ucfirst(Str::lower($inputs['surname']));
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        if ($inputs['roles']) {
            $user->roles()->attach(Role::find($inputs['roles']));
            Session::flash('record_created', 'Your user has been successfully created and the role assigned');
        } else {
            Session::flash('record_created', 'Your user has been successfully created without a role');
        }
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $users = DB::table('users')
            ->where("firstname", "LIKE", "%" . $request['query'] . "%")
            ->orWhere("middlename", "LIKE", "%" . $request['query'] . "%")
            ->orWhere("surname", "LIKE", "%" . $request['query'] . "%")
            ->orderBy('created_at', 'DESC')->paginate(5);

        return view('admin.users.index', compact(['users']));
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

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $inputs = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => 'nullable|file|mimes:jpg,png|',
            'phone_number' => 'nullable|size:11',
            'date_of_birth' => 'nullable|date',
            'gender' => ['required'],
        ]);
        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }
        $user->update($inputs);
        Session::flash('record_updated', 'Your user: ' . $inputs['surname'] . ' ' . $inputs['firstname'] . ' has been successfully updated');
        return back();
    }

    public function passwordedit(User $user)
    {
        if (auth::user()->id == $user->id) {
            return view('admin.users.password-edit', compact('user'));
        } else {
            abort(401);
        }


    }

    public function passwordupdate(User $user)
    {
        if (auth::user()->id == $user->id) {
            if ($user->userHasRole('administrator')) {
                $inputs = Request()->validate([
                    'currentpassword' => 'current_password',
                    'password' => ['required', 'string', 'confirmed', Password::min(8)
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()],
                ]);
            } elseif ($user->userHasRole('teacher')) {
                $inputs = Request()->validate([
                    'currentpassword' => 'current_password',
                    'password' => ['required', 'string', 'confirmed', Password::min(8)
                        ->mixedCase()
                        ->uncompromised()],
                ]);
            } else {
                $inputs = Request()->validate([
                    'currentpassword' => 'current_password',
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);

            }
            User::where('id', auth::user()->id)->update(['password' => Hash::make($inputs['password'])]);
            Session::flash('password_updated', 'Your password has been successfully changed');
            return back();
        } else {
            abort(401);
        }


    }

    public function statusupdate(){
        return "yeah the status gon be updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //

        return "yeah the user gon be destroyed";
//        $user->delete();
//        Session::flash('message', 'The user with name ' . $user->name . 'was deleted.');
//        return back();
    }
}
