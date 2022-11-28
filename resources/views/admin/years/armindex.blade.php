<x-portal-layout>

    @section("content")

        @if($years)
            <div class="col-md-10">
                <div class="card card-default card-body">
                    <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                        @foreach($years as $class)
                        <li class="nav-item">
                            <a class="nav-link @if($year_id == $class->id) active @endif" href="" data-target="{{'#year'.$class->name}}" data-toggle="tab">{{'Year '.$class->slug}}</a>
                        </li>
                        @endforeach

                    </ul>
                    <!--/tabs-->
                    <br>
                    <div id="tabsJustifiedContent" class="tab-content">
                        @foreach($years as $class)
                        <div class="tab-pane @if($year_id == $class->id) active @endif" id="{{'year'.$class->name}}">
                            <div class="list-group">
                                <a href="" class="list-group-item"><span
                                        class="float-right label label-success">51</span> Year {{$class->slug}} currently has 3 arms</a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--/tabs content-->
                </div><!--/card-->
            </div><!--/col-->
        @else
            <h1>You have not yet created any classes. Click on the class icon in the sidebar to add classes</h1>
        @endif
    @endsection
</x-portal-layout>

