<x-portal-layout>
    @section('styles')
        <link href="{{asset('css/general.css')}}" rel="stylesheet">
    @endsection
    @section("content")

        @if(\Illuminate\Support\Facades\Session::has('success-message'))
            <div class="alert sticky-top alert-success " style="z-index: 200">{{\Illuminate\Support\Facades\Session::get('success-message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('info-message'))
            <div class="alert  sticky-top alert-info" style="z-index: 200">{{\Illuminate\Support\Facades\Session::get('info-message')}}</div>
        @endif
        @error('score_1')
        <div class="alert alert-danger sticky-top" style="z-index: 200">{{$message}}</div>
        @enderror
        @error('score_2')
        <div class="alert alert-danger sticky-top" style="z-index: 200">{{$message}}</div>
        @enderror
        @error('score_3')
        <div class="alert alert-danger sticky-top" style="z-index: 200">{{$message}}</div>
        @enderror


        <section id="tabs" class="project-tab">
            <span id="token" class="ghost">{{csrf_token()}}</span>

            <span id="year_id" class="ghost">{{$year->id}}</span>

            <span id="subject_id" class="ghost">{{$subject->id}}</span>

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
                                   aria-selected="true">{{'Year '.$year->slug.' '.$subject->name}}</a>
                            </div>
                        </nav>
                        <div class="tab-content mobile-overflow" id="nav-tabContent">


                            <div
                                class="tab-pane fade  show active "
                                id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>@if(+$detail->exam == 1 )
                                                C.A.Test 1
                                            @else
                                                Assignment
                                            @endif</th>
                                        <th>@if(+$detail->exam == 1 )
                                                C.A.Test 2
                                            @else
                                                Classwork
                                            @endif</th>
                                        </th>
                                        <th>@if(+$detail->exam == 1 )
                                                Exam Scores
                                            @else
                                                Test

                                            @endif</th>
                                        </th>
                                        <th>Submit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($year->users as $user)
                                        @if($user->roles->contains($student_role)  )
                                            <tr >
                                                <td>
                                                    {{$user->surname.' '.$user->firstname}}
                                                </td>
                                                @if($user->arm)
                                                    <td>{{'Year '.$user->year->slug.' '.$user->arm->name}}</td>
                                                @else
                                                    <td>{{'Year '.$user->year->slug.' null' }}</td>
                                                @endif
                                                <td>
                                                    <form>
                                                        <input
                                                            id="{{'nav_home_'.($loop->index + 1).'_1'}}"
                                                            class="form-control-sm form-control" type="number" min="0"
                                                            max="{{$detail->small_value}}"
                                                            step="any"
                                                            name="score_1"
                                                            value={{$user->singleSubjectScore($subject->id)->get()->last() ?
                                                                      $user->singleSubjectScore($subject->id)->get()->last()->score_1: ''}}>


                                                    </form>

                                                </td>
                                                <td>
                                                    <form>
                                                        <input
                                                            id="{{'nav_home_'.($loop->index + 1).'_2'}}"
                                                            class="form-control-sm form-control"
                                                            type="number" min="0" step="any" name="score_2"
                                                            value={{$user->singleSubjectScore($subject->id)->get()->last() ?
                                                                      $user->singleSubjectScore($subject->id)->get()->last()->score_2: ""}} >
                                                    </form>
                                                </td>
                                                <td>
                                                    <form>
                                                        <input
                                                            id="{{'nav_home_'.($loop->index + 1).'_3'}}"
                                                            class="form-control-sm form-control"
                                                            type="number" min="0" step="any" name="score_3"
                                                            value={{$user->singleSubjectScore($subject->id)->get()->last() ?
                                                                      $user->singleSubjectScore($subject->id)->get()->last()->score_3: ''}}
                                                        >
                                                        <input
                                                            id="{{'nav_home_'.($loop->index + 1).'_user_id'}}"
                                                            class="form-control"
                                                            hidden value="{{$user->id}}" name="user_id">
                                                        <input
                                                            id="{{'nav_home_'.($loop->index + 1).'_arm_id'}}"
                                                            class="form-control"
                                                            hidden value="{{$user->arm_id}}"
                                                            name="arm_id">
                                                    </form>
                                                </td>
                                                <td>
                                                    <button type="submit"
                                                            onclick="submitFunction({{'nav_home_'.($loop->index + 1).'_1'}},
                                                                            {{'nav_home_'.($loop->index + 1).'_2'}},
                                                                            {{'nav_home_'.($loop->index + 1).'_3'}},
                                                                            {{'nav_home_'.($loop->index + 1).'_user_id'}},
                                                                            {{'nav_home_'.($loop->index + 1).'_arm_id'}},
                                                                            {{$loop->index}})"
                                                            class="btn btn-outline-primary btn-circle">
                                                        <i class="fas fa-check"></i></button>
                                                </td>
                                            </tr>

                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('scripts')
        <script src="{{asset('js/enterscore.js')}}"></script>

    @endsection
</x-portal-layout>
