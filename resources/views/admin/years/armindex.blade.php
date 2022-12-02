<x-portal-layout>

    @section("content")
        <br>
        @if(\Illuminate\Support\Facades\Session::has('success_message'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success_message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('error_message'))
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('error_message')}}</div>
        @endif

        @if($years)
            <div class="col-md-10">
                <div class="card card-default card-body">
                    <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                        @foreach($years as $class)
                            <li class="nav-item">
                                <a class="nav-link @if($year_id == $class->id) active @endif" href=""
                                   data-target="{{'#year'.$class->name}}" data-toggle="tab">{{'Year '.$class->slug}}</a>
                            </li>
                        @endforeach

                    </ul>
                    <!--/tabs-->
                    <br>
                    <div id="tabsJustifiedContent" class="tab-content">
                        @foreach($years as $class)
                            <div class="tab-pane @if($year_id == $class->id) active @endif"
                                 id="{{'year'.$class->name}}">
                                <div class="list-group">
                                    <div href="#" class="list-group-item">{{count($class->arms)}} arms
                                        @foreach($class->arms as $arm)
                                            <div>
                                                <br><span
                                                    class="float-right "><button type="submit" data-toggle="modal"
                                                                                 data-target="#exampleModal"
                                                                                 data-year_id="{{$class->id}}"
                                                                                 data-arm_id="{{$arm->id}}"
                                                                                 data-year_name="{{$class->slug}}"
                                                                                 data-arm_name="{{$arm->slug}}"
                                                                                 class="btn btn-outline-danger btn-circle"><i
                                                            class="fas fa-solid  fa-trash "></i>
                                                            </button></span> <a
                                                    href="{{route('class.profile',[$class->id,$arm->id])}}"> {{'Year '.$class->slug.' '.$arm->name }}</a>

                                            </div>
                                        @endforeach
                                        <br>
                                        <br>
                                        <form method="post" action="{{route('arm.attach')}}">
                                            @csrf
                                            @method('PATCH')


                                            <select class="form-control @error('arm_name') is-invalid @enderror"
                                                    id="class_name"
                                                    name="arm_id">
                                                @foreach($arms as $arm)
                                                    @if(!$class->arms->contains($arm))
                                                        <option value="{{$arm->id}}">{{$arm->name}}</option>
                                                    @endif
                                                @endforeach
                                                <input type="hidden" value="{{$class->id}}" name="class_id">
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-outline-primary float-end"> Add New
                                                Arm
                                            </button>


                                        </form>
                                    </div>


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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('arm.detach')}}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input name="arm_id" hidden type="text" class="form-control" id="arm-id">
                            <div><input name="class_id" hidden type="text" class="form-control" id="class-id"></div>
                            <button class="btn btn-outline-danger" type="submit">Remove</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var arm_name = button.data('arm_name')
                var class_name = button.data('year_name')
                var class_id = button.data('year_id')
                var arm_id = button.data('arm_id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Detach Arm?')
                modal.find('.modal-body').text('Are you sure you want to remove ' + arm_name + ' from Year ' + class_name + ' ?')
                modal.find('.modal-footer input').val(arm_id)
                modal.find('.modal-footer div input').val(class_id)
            })
        </script>
    @endsection
</x-portal-layout>

