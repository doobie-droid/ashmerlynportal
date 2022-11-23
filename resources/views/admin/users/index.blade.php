<x-portal-layout>
    @section('style')
        <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endsection
    @section('content')
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
        @endif
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                @if($status == 'all')
                    <a href="{{route('user.index')}}">
                        <button class="btn btn-outline-primary text-right">Show All Users</button>
                    </a>
                @else
                    <a href="{{route('user.inactive-index')}}">
                        <button class="btn btn-outline-primary text-right">Show All Deactivated Users</button>
                    </a>
                @endif
                <br>
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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Profile Picture</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Date of Birth</th>

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

                            <th>Last Update:</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{route('user.profile.edit',$user->id)}}">{{$user->surname.' '.$user->firstname}}</a>
                                    </td>
                                    <td><img height="60px" src="{{$user->avatar}}"></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->date_of_birth}}</td>

                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                    <td>
                                        <form method="post" action="{{route('user.status.update',$user->id)}}">
                                            @csrf
                                            @method('PATCH')
                                            @if($user->status == 1)
                                                <button type="submit" class="btn btn-outline-danger">
                                                    Deactivate
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-outline-success">
                                                    Activate
                                                </button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>

                                        <button data-toggle="modal" data-target="#exampleModal"
                                                data-firstname="{{$user->firstname}}" data-userid="{{$user->id}}"
                                                type="button" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{$users->links()}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('user.destroy')}}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input name="id" hidden type="text" class="form-control" id="user-id">
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var firstname = button.data('firstname')
                var userid = button.data('userid') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Remove Record?')
                modal.find('.modal-body').text('Are you sure you would like to delete ' + firstname)
                modal.find('.modal-footer input').val(userid)
            })
        </script>
    @endsection
</x-portal-layout>

{{--<form method="post" action="{{route('user.destroy',$user->id)}}">--}}
{{--    @csrf--}}
{{--    @method('DELETE')--}}
{{--    <button  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" type="submit" class="btn btn-danger btn-circle">--}}
{{--        <i class="fas fa-trash"></i>--}}
{{--    </button>--}}
{{--</form>--}}
