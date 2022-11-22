<x-portal-layout>

    @section('content')
        @if(\Illuminate\Support\Facades\Session::has('record_created'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('record_created')}}</div>
        @endif
        <form method="POST" action="{{ route('user.create') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="username" class="col-md-4 col-form-label ">{{ __('Username') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                           name="username" placeholder="Required Field..." required autocomplete="username" autofocus>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="firstname" class="col-md-4 col-form-label ">{{ __('Firstname') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                           name="firstname" placeholder="Required Field..." required autocomplete="firstname">

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="middlename" class="col-md-4 col-form-label ">{{ __('Middlename') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror"
                           name="middlename" placeholder="Required Field..." required autocomplete="middlename">

                    @error('middlename')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="surname" class="col-md-4 col-form-label ">{{ __('Surname') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                           name="surname" placeholder="Required Field..." required autocomplete="surname">

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="email" class="col-md-4 col-form-label ">{{ __('Email:') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" placeholder="Required Field..." required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="phone_number" class="col-md-4 col-form-label ">Telephone:</label>
                </div>
                <div class="col-md-8">
                    <input id="phone_number" type="text"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           name="phone_number">

                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            @if($roles)
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="role" class="col-md-4 col-form-label ">{{ __('Role') }}</label></div>
                    <div class="col-md-8">

                        <select class="form-control" id="role" name="roles">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="row mb-3">

                <div class="col-md-3">
                    <label for="role" class="col-md-4 col-form-label ">D.O.B</label></div>
                <div class="col-md-8">
                    <input name="date_of_birth" type="date"
                           class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                    >
                    @error('date_of_birth')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="gender" class="col-md-4 col-form-label ">{{ __('Gender:') }}</label></div>
                <div class="col-md-8">

                    <select class="form-control" id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">

                    <label for="avatar" class="col-md-4 col-form-label ">Photo:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                           id="avatar">
                    @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="password-confirm" class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>
                </div>
                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">
                </div>
            </div>




            <div class="row mb-0">
                <div class="col-md-3"></div>
                <div class="col-md-8 text-md-end">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>

    @endsection
</x-portal-layout>
