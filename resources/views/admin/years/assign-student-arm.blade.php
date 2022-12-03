<x-portal-layout>
    @section('style')
        <style>
            @media screen and (max-width: 600px) {
                .specific-ghost {
                    visibility: hidden;
                    display: none;
                }

                .ghost1 {
                    display: none;
                }
            }

            @media screen and (min-width: 600px) {
                .specific-ghost-inverse {
                    visibility: hidden;
                    display: none;
                }
            }


        </style>
    @endsection
    @section('content')
        <h5 class="table-isactive ">Year {{\Illuminate\Support\Str::ucfirst($year->slug)}} </h5>
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
            @endif
        @foreach($students as $student)
            <form method="post" action="{{route('student.arm.assign.update',$year->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group row col-sm-12  ">
                    <label for="staticEmail" class="specific-ghost col-sm-1 col-form-label">{{$loop->index + 1}}</label>
                    <div class="col-sm-3">
                        <a onclick="show({{'form_submit'.$student->id}})" href="#"><span class="form-control-plaintext btn-link @if(!$student->arm_id)empty-data @endif">{{$student->surname.' '.$student->firstname}}</span></a>
                    </div>
                    <div class="col-sm-8 row ghost1 " id="{{'form_submit'.$student->id}}">
                        <input hidden type="text" value="{{$student->id}}" name="user_id">
                        <div class="col col-sm-6">
                            <select name="arm_id" class="  form-control" id="cars" >
                                @foreach($year->arms as $arm)

                                    <option @if($student->arm_id ==  $arm->id) selected
                                            @endif value="{{$arm->id}}">{{$arm->name}}</option>

                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class="col col-sm-6">
                            <button type="submit" class="  btn-block btn btn-outline-primary">Assign</button>
                        </div>
                    </div>


                </div>
            </form>

        @endforeach
        <br><br>
        <p class=" "> Students in <span class="empty-data"> Red </span> currently have no arm assigned to them</p>
    @endsection
    @section('scripts')
        <script>
            function show(event1) {
                $(event1).slideToggle('slow')


            }
        </script>
    @endsection
</x-portal-layout>
