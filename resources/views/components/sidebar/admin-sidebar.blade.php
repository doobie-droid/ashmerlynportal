{{--Admin Sidebar--}}
<!-- Divider -->



<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    ADMIN PRIVILEGES
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item show-element">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-users"></i>
        <span>Users</span>
    </a>
    <div id="collapseUsers" class="collapse " aria-labelledby="headingUsers" data-parent="#accordionSidebar" >
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('user.create')}}"> <i class="fas fa-user-plus"></i> Add New User</a>
            <a class="collapse-item" href="{{route('role.index')}}"><i class="fas fa-user-tie"></i> View By Roles</a>
            <a class="collapse-item" href="{{route('user.active-index')}}"> <i class="fas fa-user-check"></i>View All Active Users</a>
            <a class="collapse-item" href="{{route('user.inactive-index')}}"> <i class="fas fa-user-slash"></i>View All Inactive Users</a>

            <a class="collapse-item" href="{{route('user.index')}}"> <i class="fas fa-users"></i>View All Users</a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Classes</span>
    </a>
    <div id="collapseClasses" class="collapse" aria-labelledby="headingClasses" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Classes:</h6>
            <a class="collapse-item" href="{{route('class.index.arm','empty')}}"> View Classes</a>
            <a class="collapse-item" href="{{route('class.create')}}"> Add/Remove Subject </a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeachers" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Teachers</span>
    </a>
    <div id="collapseTeachers" class="collapse" aria-labelledby="headingTeachers" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Teachers</h6>
            <a class="collapse-item" href="{{route('role.users.show','teacher')}}"> View </a>
            <a class="collapse-item" href="{{route('assign.class.user.edit')}}"> Change Class Teacher</a>
            <a class="collapse-item" href="{{route('assign.subject.user.edit')}}"> Change Subject Teacher </a>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubjects" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Subjects</span>
    </a>
    <div id="collapseSubjects" class="collapse" aria-labelledby="headingSubjects" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('subject.create')}}"> Add Subjects</a>
        </div>
    </div>
</li>


