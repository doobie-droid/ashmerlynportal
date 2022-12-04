<x-portal-layout>
    @section('style')
        <link href="{{asset('css/result.css')}}" rel="stylesheet">

    @endsection
    @section('content')
        <!--main content wrapper-->
        @if(+$details->show_result == 1)
            @if($user->status == 1)

                <div class="mcw mh-100">
                    <!--navigation here-->
                    <!--main content view-->
                    <div class="cv table-responsive">
                        <div class="container-pseudo table-responsive">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-11 ">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="row" colspan="13" class="text-center">
                                            {{$user->surname.' '.$user->middlename.' '.$user->firstname}}
                                            <br/>@switch($details->term)
                                                @case(1)FIRST TERM EXAMINATION @break @case(2)SECOND TERM
                                                EXAMINATION @break @case(3)THIRD TERM EXAMINATION @break@default INVALID
                                                EXAM ENTRY
                                            @endswitch
                                            <br/>YEAR {{$user->year->name}} {{$user->arm->name}}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">COGNITIVE DOMAIN</th>
                                        <th scope="col">Test 1(20)</th>
                                        <th scope="col">Test 2(20)</th>
                                        <th scope="col">Exam (60)</th>
                                        <th scope="col">Mark %</th>
                                        <th scope="col">Sub. Av.(Yr)</th>
                                        <th scope="col">Sub. Av.<br/>(Cl)</th>
                                        <th scope="col">Sub. Pos.(Yr)</th>
                                        <th scope="col">Sub. Pos.(Cl)</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Rem</th>
                                        <th scope="col">Tutor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($scores as $score)
                                        <tr>
                                            <th scope="row">{{$loop->index + 1}}</th>
                                            <td>{{$score->subject->name}}</td>
                                            <td>{{$score->score_1}}</td>
                                            <td>{{$score->score_2}}</td>
                                            <td>{{$score->score_3}}</td>
                                            <td>{{$score->score_total}}</td>
                                            <td>{{round($score->subject->subjectYearAverageExam->avg('score_total'),1)}}</td>
                                            <td>{{round($score->subject->subjectArmAverageExam->avg('score_total'),1)}}</td>
                                            <td>{{$score->subject->subjectPositionYearExam()}}</td>
                                            <td>{{$score->subject->subjectPositionArmExam()}}</td>
                                            @if($score->score_total >= 96)
                                                <td> A+</td>
                                                <td>EXCELLENT: Keep it up</td>
                                            @elseif($score->score_total >= 90)
                                                <td>A</td>
                                                <td>BRAVO: You are almost there!</td>
                                            @elseif($score->score_total >= 86)
                                                <td> A-</td>
                                                <td>NICE JOB: Keep the flag high</td>
                                            @elseif($score->score_total >= 80)
                                                <td>B+</td>
                                                <td>EXCELLENT: Do not relent in your effort</td>
                                            @elseif($score->score_total >= 76)
                                                <td>B</td>
                                                <td>GOOD JOB: Outstanding performance</td>
                                            @elseif($score->score_total >= 70)
                                                <td>B-</td>
                                                <td>NICE ONE: You can do much more</td>
                                            @elseif($score->score_total >= 66)
                                                <td>C+</td>
                                                <td>GOOD: Work harder</td>
                                            @elseif($score->score_total >= 60)
                                                <td>C</td>
                                                <td>GOOD: Work Harder</td>
                                            @elseif($score->score_total >= 56)
                                                <td>C-</td>
                                                <td>FAIR: You are capable</td>
                                            @elseif($score->score_total >= 50)
                                                <td>D+</td>
                                                <td>NOT BAD: Improvements can be made</td>
                                            @elseif($score->score_total >= 46)
                                                <td>D</td>
                                                <td>OKAY: Effort yield results</td>
                                            @elseif($score->score_total >= 40)
                                                <td>D-</td>
                                                <td>FAIR: Work Harder</td>
                                            @else
                                                <td>F</td>
                                                <td>NOT THERE YET: you can do it</td>
                                            @endif


                                            <td>{{$score->teacher->surname.' '.$score->teacher->firstname}}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <th scope="row" style="height: 45px"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="height: 45px"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="height: 45px"></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th scope="row" style="height: 45px" colspan="2">
                                                Student's Average
                                            </th>
                                            <td>{{round($user->examScores->avg('score_total'),1)}}</td>

                                            <td colspan="5"><b>Position in Class</b></td>

                                            <td>1/21</td>
                                            <td colspan="2">Class Teacher:</td>

                                            <td colspan="2">
                                                {{$user->surname.' '.$user->firstname}} just needs to apply himself
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="height: 45px" colspan="2">Class Average</td>
                                            <td>95.6</td>
                                            <td colspan="5"><b>Position in Year</b></td>
                                            <td>1/72</td>
                                            <td colspan="2">Principal:</td>
                                            <td colspan="2">
                                                {{$user->surname.' '.$user->firstname}} is self confident and if he
                                                keeps up his serious attitude
                                                to learn, he would achieve great things
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" style="height: 45px" colspan="2">Year Average</td>
                                            <td>95.6</td>

                                            <td colspan="2">Signature</td>

                                            <td colspan="4">
                                                <img src="{{asset('sign.webp')}}" class="signatures"/>
                                            </td>
                                            <td colspan="2">Date:</td>

                                            <td colspan="2">_________________________</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" colspan="13">
                                                NOTE: THIS IS NOT AN OFFICIAL TRANSCRIPT, SEND A MESSAGE TO EXAMS
                                                AND RECORDS FOR YOUR OFFICIAL TRANSCRIPT
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" class="text-center" colspan="13">
                                                AFFECTIVE DOMAIN
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" colspan="2">PUNCTUALITY</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="2">ATTENDANCE</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="2">STUDY HABIT</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="3">TEAM SPIRIT</td>
                                            <td scope="row">4</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" colspan="2">REL. WITH OTHERS</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="2">SELF CONTROL</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="2">OBEDIENCE</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="3">NEATNESS</td>
                                            <td scope="row">4</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" colspan="2">RESPECT FOR AUTHORITY</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="2">HANDWRITING</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="2">HANDLING OF MATERIALS</td>
                                            <td scope="row">4</td>
                                            <td scope="row" colspan="1">SPORTS</td>
                                            <td scope="row" colspan="0.5">4</td>
                                            <td scope="row" colspan="0.5">EXTRACURRICULAR</td>
                                            <td scope="row">4</td>
                                        </tr>
                                        <tr>
                                            <td scope="row" colspan="5">
                                                Key to Rating : <br/>5 - Excellent show of trait, 4 - High level
                                                show of trait,<br/>3 - Acceptable show of trait, 2- Minimal show
                                                of trait,<br/>
                                                1 - No regard for the trait
                                            </td>
                                            <td scope="row" colspan="2">
                                                <b>Excellent</b><br/>
                                                96 - 100 A+ <br/>
                                                90 - 95 A <br/>
                                                86 - 89 A- <br/>
                                            </td>
                                            <td scope="row" colspan="2">
                                                <b>Very Good</b><br/>
                                                80 - 85 B+ <br/>
                                                76 - 79 B <br/>
                                                70 - 75 B- <br/>
                                            </td>
                                            <td scope="row" colspan="2">
                                                <b>Good</b><br/>
                                                66 - 69 C+ <br/>
                                                60 - 65 C <br/>
                                                56 - 59 C- <br/>
                                            </td>
                                            <td scope="row">
                                                <b>Pass</b><br/>
                                                50 - 55 D+ <br/>
                                                46 - 49 D <br/>
                                                40 - 45 D- <br/>
                                            </td>
                                            <td scope="row">
                                                <b>Fail: </b> 39 and Below F<br/>
                                                <b>False: </b> Subject not Offered<br/>
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
            @else
                <h5> Your account has been disabled and you cannot view this page. Contact Admin</h5>
            @endif
        @else
            <h5> Your results are being processed and would be displayed soon....</h5>
        @endif
    @endsection
</x-portal-layout>
