<x-portal-layout>


    @section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Deactivated Users</h6>
                <br>

                <form method="get" action="{{route('user.show',$status)}}">
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
                    @if($users)
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                            <tr>

                                <th>Name</th>
                                <th>Profile Picture</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Date of Birth</th>
                                <th>Last Update:</th>
                            </tr>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>Name</th>
                                <th>Profile Picture</th>
                                <th>Email</th>
                                <th>Sex</th>
                                <th>Date of Birth</th>
                                <th>Last Update:</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td><a href="{{route('user.profile.edit',$user->id)}}">{{$user->surname.' '.$user->firstname}}</a></td>
                                    <td><img height="60px" src="{{$user->avatar}}"></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->date_of_birth}}</td>

                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1>There are currently no active users</h1>
                    @endif
                </div>
            </div>
        </div>
        {{$users->links()}}
    @endsection

</x-portal-layout>

