<x-portal-layout>
    @section('content')
        @if($user->year_id == null)
            <h1>You have not been assigned a Year yet</h1>
        @elseif($user->arm_id == null)
            <h1> You are not teaching any arm</h1>
        @else
            @if(\Illuminate\Support\Facades\Session::has('success-message'))
                <div class="alert sticky-top alert-success " style="z-index: 200">{{\Illuminate\Support\Facades\Session::get('success-message')}}</div>
            @elseif(\Illuminate\Support\Facades\Session::has('info-message'))
                <div class="alert  sticky-top alert-info" style="z-index: 200">{{\Illuminate\Support\Facades\Session::get('info-message')}}</div>
            @endif



            <section id="tabs" class="project-tab">
                <span id="token" class="ghost">{{csrf_token()}}</span>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">


                                    <a class="nav-item nav-link active"
                                       id="'nav-home-tab"
                                       data-toggle="tab"
                                       href="#nav-home" role="tab"
                                       aria-controls="nav-home"
                                       aria-selected="true">{{'Year '.$user->year->slug.' '.$user->arm->name}}</a>
                                </div>
                            </nav>
                            <div class="tab-content mobile-overflow" id="nav-tabContent">


                                <div
                                    class="tab-pane fade  show active "
                                    id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <table class="table table-responsive" cellspacing="0">
                                        <thead  >
                                        <tr >
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Punctuality</th>
                                            <th>Attendance</th>
                                            <th>Team Spirit</th>
                                            <th>Rel. with Others</th>
                                            <th>Self Control</th>
                                            <th>Obedience</th>
                                            <th>Neatness</th>
                                            <th>Respect for Authority</th>
                                            <th>Handwriting</th>
                                            <th>Handling of Materials</th>
                                            <th>Sports</th>
                                            <th>Extracurricular Activities</th>
                                            <th>Class Teacher's Remarks</th>
                                            <th>Submit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)

                                                <tr >
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>
                                                        {{$student->surname.' '.$student->firstname}}
                                                    </td>
                                                    @foreach(array_slice($columns,4,12) as $column)
                                                    <td><select class="form-select form-select-sm " >
                                                            <option value=>{{$column}}</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="3">4</option>
                                                            <option value="3">5</option>
                                                        </select></td>
                                                    @endforeach
                                                    <td> <input class="form-control form-control-sm" type="text"></td>
                                                    <td><button type="submit" class="btn btn-sm btn-outline-primary btn-circle"><i class="fas fa-check"></i></button></td>
                                                </tr>

                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endsection
</x-portal-layout>
