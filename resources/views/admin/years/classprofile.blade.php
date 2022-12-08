<x-portal-layout>

    @section('content')
        <div>
            <h1>Year {{$year->name}} {{$arm->name}}</h1>
            <h5 class="table-isactive"> Class Teacher: {{auth()->user()->getName($teacher_details->user_id)}}</h5>
        </div>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Names</th>
                    <th scope="col">Punctuality</th>
                    <th scope="col">Attendance</th>
                    <th scope="col">Name</th>
                    <th scope="col">Team Spirit</th>
                    <th scope="col">Rel. with Others</th>
                    <th scope="col">Self Control</th>
                    <th scope="col">Obedience</th>
                    <th scope="col">Neatness</th>
                    <th scope="col">Respect for Authority</th>
                    <th scope="col">Handwriting</th>
                    <th scope="col">Handling of Materials</th>
                    <th scope="col">Sports</th>
                    <th scope="col">Extracurricular Activities</th>
                    <th scope="col">Class Teacher's Remarks</th>
                </tr>
                </thead>
                <tbody>
                <span class="ghost">{{$counter = 0}}</span>

                @foreach($year->users as $student)

                    @if($student->roles->contains($student_role) && $student->arm_id == $arm->id)
                        <span class="ghost">{{$counter += 1}}</span>
                        <tr>
                            <td scope="row">
                                {{$student->surname.' '.$student->firstname}}
                            </td>
                            <td>4</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>4</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>4</td>
                            <td>5</td>
                            <td>7</td>
                            <td>8</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <h5> {{$counter}} students</h5>
        </div>
    @endsection
</x-portal-layout>
