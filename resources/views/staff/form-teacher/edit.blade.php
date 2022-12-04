<x-portal-layout>
    @section('content')
        @if($user->year_id == null)
            <h1>You have not been assigned a Year yet</h1>
        @elseif($user->arm_id == null)
            <h1> You are not teaching any arm</h1>
        @else
            <h1>This feature would be added upon adoption of the project</h1>
        @endif
    @endsection
</x-portal-layout>
