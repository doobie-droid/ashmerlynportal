<x-portal-layout>

    @section('content')
        @if(\Illuminate\Support\Facades\Session::has('password_updated'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('password_updated')}}</div>
        @endif
        <form method="post" action="{{route('user.password.update',$user->id)}}">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Current Password</label>
                    <input type="password" name="currentpassword" class="form-control @error('currentpassword') is-invalid @enderror"
                           id="password">
                    @error('currentpassword')

                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           id="password">
                    @error('password')

                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Confirm  New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password-confirm">

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    @endsection
</x-portal-layout>
