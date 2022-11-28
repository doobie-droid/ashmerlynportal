<x-portal-layout>

    @section("content")
        @if($years)
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                @foreach($years as $class)
                <li class="nav-item">
                    <a class="nav-link @if($loop->index == 0)active @endif" href="{{'#year'.$class->name}}" role="tab" data-toggle="tab">{{'Year '.$class->slug}}</a>
                </li>
                @endforeach

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                @foreach($years as $class)

                <div role="tabpanel" class="tab-pane @if($loop->index == 0)active @endif" id="{{'year'.$class->name}}">
                    <p>
                        <br>
                        Year {{$class->slug}} currently has 3 arms
                        <br>
                        <br>
                        <button class="btn btn-primary-outline btn-lg">Wow</button>
                    </p>
                </div>
                @endforeach

            </div>
        </div>
        @else
            <h1>You have not yet created any classes. Click on the class icon in the sidebar to add classes</h1>
        @endif
    @endsection
</x-portal-layout>
