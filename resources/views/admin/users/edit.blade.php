<x-portal-layout>

    @section('content')
        @if($user)
            @if(\Illuminate\Support\Facades\Session::has('record_updated'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('record_updated')}}</div>
            @elseif(\Illuminate\Support\Facades\Session::has('role_detach'))
                <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('role_detach')}}</div>
            @elseif(\Illuminate\Support\Facades\Session::has('role_attach'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('role_attach')}}</div>
            @elseif(\Illuminate\Support\Facades\Session::has('error_message'))
                <div class="alert alert-danger opacity-75">{{\Illuminate\Support\Facades\Session::get('error_message')}}</div>
            @endif

            <form method="get" action="{{route("admin.password.edit",$user->id)}}">
                @csrf

                <div class="form-row text-end">
                    <button class="btn btn-outline-primary form-control">Reset Password</button>
                </div>
            </form>
            <div class="row">
                <form method="POST" class="col-sm-8" action="{{route('user.profile.update',$user->id)}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <br>
                    <img height="60px" src="{{$user->avatar}}">

                    <br>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-10 ">
                            <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                                   id="avatar">
                            @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>FirstName</label>
                            <input name="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror
" id="firstname"
                                   placeholder="Enter your first name here...." value="{{$user->firstname}}">
                            @error('firstname')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>MiddleName</label>
                            <input name="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror
" id="middlename"
                                   placeholder="Enter your middlehere...." value="{{$user->middlename}}">
                            @error('middlename')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>Surname</label>
                            <input name="surname" type="text" class="form-control @error('surname') is-invalid @enderror
" id="surname"
                                   placeholder="Enter your Surname here..." value="{{$user->surname}}">
                            @error('surname')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>Email Address</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   value="{{$user->email}}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>Phone number</label>
                            <input name="phone_number" type="text"
                                   class="form-control @error('phone_number') is-invalid @enderror"
                                   id="email"
                                   value="{{$user->phone_number}}">
                            @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>Date of Birth</label>
                            <input name="date_of_birth" type="date" min="{{$yearstart.'-01-01'}}"
                                   max="{{($yearstart + 6).'-12-31'}}"
                                   class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                                   value="{{$user->date_of_birth}}">
                            @error('date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label>Gender</label>

                            <select class="form-control" id="sex" name="gender">
                                <option @if($user->userIs('male'))selected @endif value="male">Male</option>
                                <option @if($user->userIs('female'))selected @endif value="female">Female</option>

                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <br><br>
                </form>
                <div class="col-sm-4 table-isactive">
                    <br>
                    <div class="card h-10 border-secondary">
                        <div class="card-body">
                            <h3 class="card-title">Assigned Roles</h3>
                            <span class="card-text">
                                @foreach($user->roles as $role)
                                    @if($user->id == auth()->user()->id && $role->slug != 'administrator' || $user->id != auth()->user()->id )
                                    <p>
                                    <form method="post" action="{{route('role.detach',$user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('role.users.show',$role->slug)}}">{{$role->name}}</a>
                                        <input hidden type="text" value="{{$role->id}}" name="role_id">
                                        <button
                                            type="submit"
                                            class="btn btn-circle btn-outline-danger btn-sm float-end"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                    </p>
                                    @endif
                                @endforeach
                            </span>
                            <form method="post" action="{{route('role.attach',$user->id)}}">
                                @csrf
                                @method('PATCH')
                                <select class="form-control" id="roles" name="role_id">
                                    @foreach($roles as $role)
                                        @if(!$user->roles->contains($role))
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <br>
                                <button type="submit" href="#" class="btn btn-outline-primary">Add New Role</button>
                            </form>

                        </div>
                    </div>
                </div>


            </div>

        @endif
    @endsection
</x-portal-layout>
