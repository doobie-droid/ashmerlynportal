<x-portal-layout>
    @section('style')
        <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endsection
    @section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                            <td>{{$user->surname.' '.$user->firstname}}</td>
                            <td>Profile Picture</td>
                            <td>{{$user->email}}</td>
                            <td>Male</td>
                            <td>Date of Birth</td>
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
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/datatables-demo.js')}}"></script>
    @endsection
</x-portal-layout>
