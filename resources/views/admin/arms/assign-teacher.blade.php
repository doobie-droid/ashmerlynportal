<x-portal-layout>

    @section('content')
        <h4 class="table-isactive">Assign Class teachers here</h4>
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr class="bg-secondary text-light">
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
                            @if($class_with_arm->pivot->user_id == null)
                                <th scope="row "
                                    class=" empty-data ">{{auth()->user()->getName($class_with_arm->pivot->user_id)}}</th>
                            @else
                                <th scope="row "
                                    class=" empty-data "><a href="{{route('user.profile.edit',$class_with_arm->pivot->user_id)}}">{{auth()->user()->getName($class_with_arm->pivot->user_id)}}</a></th>
                            @endif
                            <td>
                                <form id="{{'form'.$class->id.$class_with_arm->id}}" method="post"
                                      action="{{route('assign.class.user.store','red')}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="year_id" value="{{$class->id}}">
                                    <input type="hidden" name="arm_id" value="{{$class_with_arm->id}}">
                                    <select class="form-control " name="teacher_id" id="cars">
                                        @foreach($available_teachers as $available_teacher)
                                            <option
                                                value="{{$available_teacher->id}}">{{$available_teacher->surname.' '.$available_teacher->firstname}}</option>

                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <button class="btn  btn-circle btn-outline-primary" type="submit"
                                        onclick='submitFunction({{'form'.$class->id.$class_with_arm->id}})'><i
                                        class="fas fa-sync-alt"></i></button>
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
