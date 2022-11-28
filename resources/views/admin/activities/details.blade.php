<x-portal-layout>
    @section('content')

            <h3 class="mb-3">{{\Illuminate\Support\Str::ucfirst($type).' updates'}}</h3>

        @foreach($application_updates as $application_update)
            <p>{{($loop->index + 1).' '.$application_update->action}}</p>

        @endforeach
        <div class=" mb-4 mobile-overflow">
            <div class=" py-3">   {{$application_updates->onEachSide(1)->links()}}</div>
        </div>

    @endsection
</x-portal-layout>
