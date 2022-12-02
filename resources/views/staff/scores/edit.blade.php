<x-portal-layout>
    @section('styles')
        <style>
            .project-tab {
                padding: 10%;
                margin-top: -8%;
            }

            .project-tab #tabs {
                background: #007b5e;
                color: #eee;
            }

            .project-tab #tabs h6.section-title {
                color: #eee;
            }

            .project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
                color: #0062cc;
                background-color: transparent;
                border-color: transparent transparent #f3f3f3;
                border-bottom: 3px solid !important;
                font-size: 16px;
                font-weight: bold;
            }

            .project-tab .nav-link {
                border: 1px solid transparent;
                border-top-left-radius: .25rem;
                border-top-right-radius: .25rem;
                color: #0062cc;
                font-size: 16px;
                font-weight: 600;
            }

            .project-tab .nav-link:hover {
                border: none;
            }

            .project-tab thead {
                background: #f3f3f3;
                color: #333;
            }

            .project-tab a {
                text-decoration: none;
                color: #333;
                font-weight: 600;
            }
        </style>
    @endsection
    @section("content")
        @if(\Illuminate\Support\Facades\Session::has('error-message'))
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('error-message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('success-message'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success-message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('info-message'))
            <div class="alert alert-info">{{\Illuminate\Support\Facades\Session::get('info-message')}}</div>
        @endif
        <section id="tabs" class="project-tab">
            <span id="token" class="ghost">{{csrf_token()}}</span>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if($classes)

                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    @foreach($classes as $class)
                                        @if(count($class->subjectTeacher)>0)
                                            @foreach($class->subjectTeacher as $subject)

                                                <a class="nav-item nav-link @if($loop->first && $loop->parent->first) active @endif"
                                                   id="{{'nav-home-tab_'.$class->id.'_'.$subject->id}}"
                                                   data-toggle="tab"
                                                   href="{{'#nav-home_'.$class->id.'_'.$subject->id}}" role="tab"
                                                   aria-controls="{{'nav-home_'.$class->id.'_'.$subject->id}}"
                                                   aria-selected="true">{{'Year '.auth()->user()->getYearName($subject->pivot->year_id).' '.$subject->name}}</a>

                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content mobile-overflow" id="nav-tabContent">
                                @foreach($classes as $class)
                                    @if(count($class->subjectTeacher)>0)
                                        @foreach($class->subjectTeacher as $subject)

                                            <div
                                                class="tab-pane fade @if($loop->first && $loop->parent->first) show active @endif"
                                                id="{{'nav-home_'.$class->id.'_'.$subject->id}}" role="tabpanel"
                                                aria-labelledby="{{'nav-home-tab_'.$class->id.'_'.$subject->id}}">
                                                <table class="table" cellspacing="0">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Class</th>
                                                        <th>@if(+$detail->exam == 1 )
                                                                C.A. 1
                                                            @else
                                                                Assignment
                                                            @endif</th>
                                                        <th>@if(+$detail->exam == 1 )
                                                                C.A. 2
                                                            @else
                                                                Classwork
                                                            @endif</th>
                                                        </th>
                                                        <th>@if(+$detail->exam == 1 )
                                                                Exam
                                                            @else
                                                                Test

                                                            @endif</th>
                                                        </th>
                                                        <th>Submit</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($class->users as $user)
                                                        @if($user->roles->contains($student_role) )
                                                            <tr>
                                                                <td>
                                                                    {{$user->surname.' '.$user->firstname}}
                                                                </td>
                                                                <td>{{'Year '.auth()->user()->getYearName($user->year_id)}}</td>
                                                                <td>
                                                                    <form>
                                                                        <input
                                                                            id="{{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_1'}}"
                                                                            class="form-control" type="number"
                                                                            @if($user->singleSubjectScore($subject->id)->get()->first())value={{$user->singleSubjectScore($subject->id)->get()->first()->score_1}}@endif
                                                                            min="0" max="{{$detail->small_value}}"
                                                                            step="any"
                                                                            name="score_1">
                                                                        @error('score_1')
                                                                        <div
                                                                            class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </form>

                                                                </td>
                                                                <td>
                                                                    <form>
                                                                        <input
                                                                            id="{{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_2'}}"
                                                                            class="form-control"
                                                                            type="number" min="0"
                                                                            @if($user->singleSubjectScore($subject->id)->get()->first())value={{$user->singleSubjectScore($subject->id)->get()->first()->score_2}}@endif
                                                                            max="{{$detail->small_value}}"
                                                                            step="any" name="score_2">
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <form>
                                                                        <input
                                                                            id="{{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_3'}}"
                                                                            class="form-control"
                                                                            type="number" min="0"
                                                                            @if($user->singleSubjectScore($subject->id)->get()->first())value={{$user->singleSubjectScore($subject->id)->get()->first()->score_3}}@endif
                                                                            max="{{$detail->large_value}}"
                                                                            step="any" name="score_3">
                                                                        <input
                                                                            id="{{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_year_id'}}"
                                                                            class="form-control"
                                                                            hidden value="{{$class->id}}"
                                                                            name="year_id">
                                                                        <input
                                                                            id="{{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_user_id'}}"
                                                                            class="form-control"
                                                                            hidden value="{{$user->id}}" name="user_id">
                                                                        <input
                                                                            id="{{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_subject_id'}}"
                                                                            class="form-control"
                                                                            hidden value="{{$subject->id}}"
                                                                            name="subject_id">
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <button type="submit"
                                                                            onclick='submitFunction({{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_1'}},
                                                                            {{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_2'}},
                                                                            {{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_3'}},
                                                                            {{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_year_id'}},
                                                                            {{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_user_id'}},
                                                                            {{'nav_home_'.$class->id.'_'.$subject->id.'_'.($loop->index + 1).'_subject_id'}})'
                                                                            class="btn btn-outline-primary btn-circle">
                                                                        <i class="fas fa-check"></i></button>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                            </div>

                                        @endforeach
                                    @endif
                                @endforeach

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('scripts')
        <script src="{{asset('js/enterscore.js')}}"></script>

    @endsection
</x-portal-layout>
