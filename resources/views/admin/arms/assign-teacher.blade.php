<x-portal-layout>

    @section('content')
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover">
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
                <span class="ghost">{{$counter = 0 }}</span>
                @foreach($years as $class)

                    @foreach($class->arms as $class_with_arm)
                        <tr>
                            <span class="ghost"> {{$counter = $counter + 1}}</span>
                            <th scope="row">{{$counter}}</th>
                            <th scope="row">{{'Year '.$class->slug}}</th>
                            <th scope="row">{{$class_with_arm->name}}</th>
                            <th scope="row " class="@if(auth()->user()->getName($class_with_arm->pivot->user_id) == 'null') empty-data @endif">{{auth()->user()->getName($class_with_arm->pivot->user_id)}}</th>
                            <td>
                                <form id="{{'form'.$class->id.$class_with_arm->id}}" method="post" action="{{route('assign.class.user.store','red')}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="year_id" value="{{$class->id}}">
                                    <input type="hidden" name="arm_id" value="{{$class_with_arm->id}}">
                                    <select class="form-control " name="teacher_id" id="cars" >
                                        @foreach($available_teachers as $available_teacher)
                                            <option value="{{$available_teacher}}">{{auth()->user()->getName($available_teacher)}}</option>

                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <button class="btn  btn-circle btn-outline-success" type="submit" onclick='submitFunction({{'form'.$class->id.$class_with_arm->id}})'><i class="fas fa-sync-alt"></i></button>
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
            function submitFunction(event) {
                console.log(event)
                event.submit()
            }
        </script>
    @endsection

</x-portal-layout>
