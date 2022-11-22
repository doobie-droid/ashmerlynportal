<x-portal-layout>

    @section('content')
        @if($user)
            @if(\Illuminate\Support\Facades\Session::has('record_updated'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('record_updated')}}</div>
            @endif
            <form method="POST" action="{{route('user.profile.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row text-end"><button class="btn btn-outline-dark form-control">Reset Password</button></div>
                <br>
             <img height="60px" src="{{$user->avatar}}">

                <br>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                               id="avatar">
                        @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
                        <label>Date of Birth</label>
                        <input name="date_of_birth" type="date"
                               class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                               value="{{$user->date_of_birth}}">
                        @error('date_of_birth')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Gender</label>

                        <select class="form-control" id="sex" name="gender">
                            <option @if($user->userIs('male'))selected @endif value="male">Male</option>
                            <option @if($user->userIs('female'))selected @endif value="female">Female</option>

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif
    @endsection
</x-portal-layout>
