<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://ashmerlynintsch.com/">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <img height="20px" src="{{asset('logo.png')}}"><div class="sidebar-brand-text mx-3">Ash Merlyn</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas  fa-fw fa-id-card-alt " ></i>
            <span>BioData</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Role
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <x-sidebar.student-sidebar>

    </x-sidebar.student-sidebar>

    <x-sidebar.teacher-sidebar>

    </x-sidebar.teacher-sidebar>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
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
    <x-sidebar.parent-sidebar>

    </x-sidebar.parent-sidebar>

    <x-sidebar.admin-sidebar>

    </x-sidebar.admin-sidebar>





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
