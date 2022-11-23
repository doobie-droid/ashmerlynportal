<x-portal-layout>
    @section('style')
        <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    @endsection
    @section('content')
        @if($users && count($users))
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
                                <th>Last Update:</th>
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
                                    <td>{{$user->surname.' '.$user->firstname}}</td>
                                    <td><img height="60px" src="{{$user->avatar}} alt='Profile Pic'"></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->date_of_birth}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        @else
            <h1>There are currently no users to display!</h1>
        @endif
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/datatables-demo.js')}}"></script>
    @endsection
</x-portal-layout>
