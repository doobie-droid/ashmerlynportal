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
                    @if(count($password_activities)>0)
                        @foreach($password_activities as $password_activity)
                            {{($loop->index + 1).' '.$password_activity->action}}<br><br>
                        @endforeach
                            Click to see <a href="{{route('activity.detail',$password_activities[0]->type)}}">more....</a>
                    @else
                        No passwords have been changed
                    @endif

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
                    @if(count($user_activities)>0)
                        @foreach($user_activities as $user_activity)
                            {{($loop->index + 1).' '.$user_activity->action}}<br><br>
                        @endforeach
                            Click to see <a href="{{route('activity.detail',$user_activities[0]->type)}}">more....</a>
                    @else
                        No users have been changed
                    @endif

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
                    @if(count($role_activities)>0)
                        @foreach($role_activities as $role_activity)
                            {{($loop->index + 1).' '.$role_activity->action}}<br><br>
                        @endforeach
                            Click to see <a href="{{route('activity.detail',$role_activities[0]->type)}}">more....</a>
                    @else
                        No roles have been modified or assigned
                    @endif

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
                    @if(count($destroy_activities)>0)
                        @foreach($destroy_activities as $destroy_activity)
                            {{($loop->index + 1).' '.$destroy_activity->action}}<br><br>

                        @endforeach
                            Click to see <a href="{{route('activity.detail',$destroy_activities[0]->type)}}">more....</a>
                    @else
                        No record has been deleted
                    @endif

                </div>
            </div>
        </div>

    @endsection
</x-portal-layout>
