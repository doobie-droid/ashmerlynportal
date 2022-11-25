<x-portal-layout>
    @section('content')

        <div class="card mb-4 ">
            <!-- Card Header - Accordion -->
            <a href="#collapsePasswordCard" class="d-block card-header py-3 collapsed" data-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Password Related Activity</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse  " id="collapsePasswordCard" style="">
                <div class="card-body ">
                    @if($password_activities)
                        @foreach($password_activities as $password_activity)
                            {{$password_activity->action}}<br><br>
                        @endforeach
                    @else
                        No passwords have been changed
                    @endif
                    <div class=" mb-4 overflow-scroll">
                        <div class=" py-3">   {{$password_activities->onEachSide(2)->links()}}</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card  mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseUserCreation" class="d-block card-header py-3 collapsed" data-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">User Creation/ Update Activity</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseUserCreation" style="">
                <div class="card-body">
                    @if($user_activities)
                        @foreach($user_activities as $user_activity)
                            {{$user_activity->action}}<br><br>
                        @endforeach
                    @else
                        No passwords have been changed
                    @endif
                    <div class=" mb-4 overflow-scroll">
                        <div class=" py-3">   {{$user_activities->onEachSide(2)->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseRoleManagement" class="d-block card-header py-3 collapsed" data-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Role Management Activity</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseRoleManagement" style="">
                <div class="card-body">
                    @if($role_activities)
                        @foreach($role_activities as $role_activity)
                            {{$role_activity->action}}<br><br>
                        @endforeach
                    @else
                        No passwords have been changed
                    @endif
                    <div class=" mb-4 overflow-scroll">
                        <div class=" py-3">   {{$role_activities->onEachSide(2)->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card  mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseRecordRemoval" class="d-block card-header py-3 collapsed" data-toggle="collapse"
               role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Record Removal </h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseRecordRemoval" style="">
                <div class="card-body">
                    @if($destroy_activities)
                        @foreach($destroy_activities as $destroy_activity)
                            {{$destroy_activity->action}}<br><br>
                        @endforeach
                    @else
                        No passwords have been changed
                    @endif
                    <div class=" mb-4 overflow-scroll">
                        <div class=" py-3">   {{$destroy_activities->onEachSide(2)->links()}}</div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
</x-portal-layout>
