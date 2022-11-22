<x-portal-layout>
    @section('style')
        <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endsection
    @section('content')
        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <a href="{{route('user.index')}}"><button class="btn btn-outline-primary text-right">Show All Users</button></a>
                <br>
                <br>
                <form method="get"  action="{{route('user.show')}}">
                    @csrf
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Enter any name of the user">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                </div>
                </form>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Profile Picture</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Date of Birth</th>
                            <th>Date Created:</th>
                            <th>Last Update:</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Profile Picture</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Date of Birth</th>
                            <th>Date Created:</th>
                            <th>Last Update:</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{route('user.profile.edit',$user->id)}}">{{$user->surname.' '.$user->firstname}}</a></td>
                                    <td><img height="60px" src="{{$user->avatar}}"></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->date_of_birth)->diffForHumans()}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                    <td>Activate</td>
                                    <td>Delete</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$users->links()}}
    @endsection
</x-portal-layout>
