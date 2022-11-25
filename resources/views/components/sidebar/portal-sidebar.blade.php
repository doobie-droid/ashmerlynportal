<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion  " id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="https://ashmerlynintsch.com/">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <img height="20px" src="{{asset('logo.png')}}">
        <div class="sidebar-brand-text mx-3">Ash Merlyn</div>
    </a>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @if(\Illuminate\Support\Facades\Auth::user()->userHasRole('administrator'))
        <div class="sidebar-heading">
            Admin
        </div>
    @elseif(\Illuminate\Support\Facades\Auth::user()->userHasRole('teacher'))
        <div class="sidebar-heading">
            Teacher
        </div>
    @elseif(\Illuminate\Support\Facades\Auth::user()->userHasRole('student'))
        <div class="sidebar-heading">
            Student
        </div>
    @elseif(\Illuminate\Support\Facades\Auth::user()->userHasRole('parent'))
        <div class="sidebar-heading">
            Parent
        </div>
    @else
        <div class="sidebar-heading">
            No Currently Assigned Role
        </div>
    @endif

    <!-- Nav Item - Pages Collapse Menu -->
    @can('studentAuth',\App\Models\User::class)
        <x-sidebar.student-sidebar>

        </x-sidebar.student-sidebar>
    @endcan
    @can('teacherAuth',\App\Models\User::class)

        <x-sidebar.teacher-sidebar>

        </x-sidebar.teacher-sidebar>
    @endcan

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-list"></i><span>Honour's Roll</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href=""><i class="fas fa-eye"></i> View Honor's Roll</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Publish Honor Roll</h6>
            </div>
        </div>
    </li>
    @can('parentAuth',\App\Models\User::class)
        <x-sidebar.parent-sidebar>

        </x-sidebar.parent-sidebar>
    @endcan


    @can('adminAuth',\App\Models\User::class)
        <x-sidebar.admin-sidebar>

        </x-sidebar.admin-sidebar>
    @endcan




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->
