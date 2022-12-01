{{--Teacher Sidebar--}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-book-open"></i><span>Subjects Taught</span>
        </a>

        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('score.edit',auth()->user()->id)}}"><i class="fas fa-sticky-note"></i> View Subjects</a>
            </div>
        </div>

    </li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
       aria-controls="collapseTwo">
        <i class="fas fa-home"></i><span>Form Teacher</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href=""><i class="fas fa-eye"></i> View Students</a>
        </div>
    </div>
</li>
