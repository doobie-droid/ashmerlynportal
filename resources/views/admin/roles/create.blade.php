<x-portal-layout>

    @section('content')
        @if(\Illuminate\Support\Facades\Session::has('record_created'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('record_created')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-4">
                <form action="{{route('role.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " name="name"
                               id="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <br>
                        <label for="name">Admin Token</label>
                        <input type="text" class="form-control @error('administratortoken') is-invalid @enderror " name="administratortoken"
                               id="token">
                        @error('administratortoken')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Add Role</button>
                </form>
            </div>
        </div>
    @endsection
</x-portal-layout>
