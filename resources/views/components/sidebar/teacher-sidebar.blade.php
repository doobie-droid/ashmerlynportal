{{--Teacher Sidebar--}}
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true"
       aria-controls="collapseTwo">
        <i class="fas fa-book-open"></i><span>Subjects Taught</span>
    </a>
    @if(count(auth()->user()->subjectTeacher())>0)
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach(auth()->user()->subjectTeacher() as $subject)
                <a class="collapse-item" href="{{route('score.edit',['user'=>auth()->user()->id,'year'=>$subject->year_id,'subject'=>$subject->subject_id])}}"><i
                        class="fas fa-sticky-note"></i> Year {{auth()->user()->getYearName($subject->year_id)}} {{auth()->user()->getSubjectName($subject->subject_id)}}</a>
                @endforeach
            </div>
        </div>
    @else
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fas fa-sticky-note"></i>No Subject Assigned</a>
            </div>
        </div>
    @endif
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
       aria-controls="collapseTwo">
        <i class="fas fa-home"></i><span>Form Teacher</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('form_teacher.edit',auth()->user()->id)}}"><i class="fas fa-eye"></i>
                View Students</a>
        </div>
    </div>
</li>
