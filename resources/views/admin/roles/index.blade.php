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
                <th scope="col">Role Population</th>
            </tr>
            </thead>
            <tbody>
            @if($roles)
                <div class="ghost">{{$count = 0}}</div>
                @foreach($roles as $role)
            <tr>
               <div class="ghost"> {{$count += 1}}</div>
                <th scope="row">{{$count}}</th>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>
                <td>population static</td>
            </tr>
                @endforeach
            @endif
            </tbody>
        </table>
                </div></div>
    @endsection
</x-portal-layout>
