<x-portal-layout>

    @section('content')
            <div class="col-lg-10 ">
                <div class="table-responsive-md ">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Slug</th>
                <th scope="col">Permissions</th>
                <th scope="col">Created At</th>
                <th scope="col">Last Modified At</th>

            </tr>
            </thead>
            <tbody>
            @if($roles)

                @foreach($roles as $role)
            <tr>

                <th scope="row">{{$role->id}}</th>
                <td><a href="{{route('role.users.show',$role->slug)}}">{{$role->name}}</a></td>
                <td>{{$role->slug}}</td>
                <td><a href="#">Click to Edit</a></td>
                <td>{{\Carbon\Carbon::parse($role->created_at)->diffForHumans()}}</td>
                <td>{{\Carbon\Carbon::parse($role->updated_at)->diffForHumans()}}</td>

            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
                </div></div>
    @endsection
</x-portal-layout>
