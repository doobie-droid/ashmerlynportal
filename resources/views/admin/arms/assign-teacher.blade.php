<x-portal-layout>

    @section('content')
        <h1>You come here to assign a class teacher to a class</h1>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Class</th>
                    <th scope="col">Arm</th>
                    <th scope="col">Current Teacher</th>
                    <th scope="col">Assign New Teacher</th>
                    <th scope="col">Update</th>
                </tr>
                </thead>
                <tbody>
                @foreach($years as $class)
                    @foreach($class->arms as $class_with_arm)
                        <tr>
                            <th scope="row">1</th>
                            <th scope="row">{{'Year '.$class->slug}}</th>
                            <th scope="row">{{$class_with_arm->name}}</th>
                            <th scope="row">{{auth()->user()->getTeacherName($class_with_arm->pivot->user_id)}}</th>
                            <td>
                                <form id="special" method="post" action="{{route('assign.class.user.store','red')}}">
                                    @csrf
                                    @method('PATCH')
                                    <select class="form-control" name="cars" id="cars" form="carform">
                                        @foreach($available_teachers as $available_teacher)
                                            <option value="{{$available_teacher}}">{{auth()->user()->getTeacherName($available_teacher)}}</option>

                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-primary" type="submit" onclick='submitFunction()'>Submit</button>
                            </td>

                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection
    @section("scripts")
        <script>
            function submitFunction() {
                let form = document.getElementById("special");
                form.submit();
            }
        </script>
    @endsection

</x-portal-layout>
