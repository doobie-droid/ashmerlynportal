<x-portal-layout>

    @section('content')
        @if(\Illuminate\Support\Facades\Session::has('record_created'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('record_created')}}</div>
        @endif
            <form method="POST" action="{{ route('user.create') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-3">
                    <label for="username" class="col-md-4 col-form-label ">{{ __('Username') }}</label>
                    </div>
                    <div class="col-md-8">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

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
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">

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
                        <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename" >

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
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" >

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                    </div>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
