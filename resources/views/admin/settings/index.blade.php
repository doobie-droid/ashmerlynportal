<x-portal-layout>
    @section('style')
        <style>
            .btn3d {
                position: relative;
                top: -6px;
                border: 0;
                transition: all 40ms linear;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 2px;
                margin-right: 2px;
            }

            .btn3d:active:focus,
            .btn3d:focus:hover,
            .btn3d:focus {
                -moz-outline-style: none;
                outline: medium none;
            }

            .btn3d:active, .btn3d.active {
                top: 2px;
            }

            .btn3d.btn-white {
                color: #666666;
                box-shadow: 0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255, 255, 255, 0.10) inset, 0 8px 0 0 #f5f5f5, 0 8px 8px 1px rgba(0, 0, 0, .2);
                background-color: #fff;
            }

            .btn3d.btn-white:active, .btn3d.btn-white.active {
                color: #666666;
                box-shadow: 0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, .1);
                background-color: #fff;
            }

            .btn3d.btn-default {
                color: #666666;
                box-shadow: 0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255, 255, 255, 0.10) inset, 0 8px 0 0 #BEBEBE, 0 8px 8px 1px rgba(0, 0, 0, .2);
                background-color: #f9f9f9;
            }

            .btn3d.btn-default:active, .btn3d.btn-default.active {
                color: #666666;
                box-shadow: 0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, .1);
                background-color: #f9f9f9;
            }

            .btn3d.btn-primary {
                box-shadow: 0 0 0 1px #417fbd inset, 0 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 8px 0 0 #4D5BBE, 0 8px 8px 1px rgba(0, 0, 0, 0.5);
                background-color: #4274D7;
            }

            .btn3d.btn-primary:active, .btn3d.btn-primary.active {
                box-shadow: 0 0 0 1px #417fbd inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, 0.3);
                background-color: #4274D7;
            }

            .btn3d.btn-success {
                box-shadow: 0 0 0 1px #31c300 inset, 0 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 8px 0 0 #5eb924, 0 8px 8px 1px rgba(0, 0, 0, 0.5);
                background-color: #78d739;
            }

            .btn3d.btn-success:active, .btn3d.btn-success.active {
                box-shadow: 0 0 0 1px #30cd00 inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, 0.3);
                background-color: #78d739;
            }

            .btn3d.btn-info {
                box-shadow: 0 0 0 1px #00a5c3 inset, 0 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 8px 0 0 #348FD2, 0 8px 8px 1px rgba(0, 0, 0, 0.5);
                background-color: #39B3D7;
            }

            .btn3d.btn-info:active, .btn3d.btn-info.active {
                box-shadow: 0 0 0 1px #00a5c3 inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, 0.3);
                background-color: #39B3D7;
            }

            .btn3d.btn-warning {
                box-shadow: 0 0 0 1px #d79a47 inset, 0 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 8px 0 0 #D79A34, 0 8px 8px 1px rgba(0, 0, 0, 0.5);
                background-color: #FEAF20;
            }

            .btn3d.btn-warning:active, .btn3d.btn-warning.active {
                box-shadow: 0 0 0 1px #d79a47 inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, 0.3);
                background-color: #FEAF20;
            }

            .btn3d.btn-danger {
                box-shadow: 0 0 0 1px #b93802 inset, 0 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 8px 0 0 #AA0000, 0 8px 8px 1px rgba(0, 0, 0, 0.5);
                background-color: #D73814;
            }

            .btn3d.btn-danger:active, .btn3d.btn-danger.active {
                box-shadow: 0 0 0 1px #b93802 inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, 0.3);
                background-color: #D73814;
            }

            .btn3d.btn-magick {
                color: #fff;
                box-shadow: 0 0 0 1px #9a00cd inset, 0 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 8px 0 0 #9823d5, 0 8px 8px 1px rgba(0, 0, 0, 0.5);
                background-color: #bb39d7;
            }

            .btn3d.btn-magick:active, .btn3d.btn-magick.active {
                box-shadow: 0 0 0 1px #9a00cd inset, 0 0 0 1px rgba(255, 255, 255, 0.15) inset, 0 1px 3px 1px rgba(0, 0, 0, 0.3);
                background-color: #bb39d7;
            }
        </style>
    @endsection
    @section('content')
        <div class="row col-md-10">
            <div class="col">
                <form method="post" action="{{route('result.show')}}">
                    @csrf
                    @method('PATCH')
                    <input type="text" name="show_result" value="{{+$details->show_result}}" hidden>
                    @if($details->show_result == 1)
                        <button type="submit" class="btn btn-danger btn-lg  btn3d"><span
                                class="glyphicon glyphicon-cloud"></span> Hide Result
                        </button>
                    @else
                        <button type="submit" class="btn btn-primary btn-lg  btn3d"><span
                                class="glyphicon glyphicon-cloud"></span> Show Result
                        </button>
                    @endif
                </form>
                <br>
            </div>
            <div class="col">
                @if(+$details->exam == 0)
                    <button data-toggle="modal" data-target="#exampleModal"
                            data-exam="1" data-currentmode="Midterm" data-mode="Edit Exam Mode" type="button"
                            class="btn btn-success btn-lg  btn3d"><span
                            class="glyphicon glyphicon-cloud"></span>Click to Edit Exam
                    </button>
                @else
                    <button data-toggle="modal" data-target="#exampleModal"
                            data-exam="0" data-currentmode="Exam" data-mode="Edit Midterm Mode" type="button"
                            class="btn btn-danger btn-lg  btn3d"><span
                            class="glyphicon glyphicon-cloud"></span>Click to Edit Midterm
                    </button>
                @endif
                <br>
            </div>
            <div class="col float-end">

                <button type="submit" class="btn btn-success btn-lg  float-end btn3d"><span
                        class="glyphicon glyphicon-cloud"></span> Promote Users
                </button>
            </div>
        </div>
        <br>
        <div class="row table-isactive">
            <div class="col-md-6">
                <div class="card h-10 border-primary">
                    <div class="card-body">
                        <h3 class="card-title">Term Under Edit? @if(+$details->term == 1)
                                First Term
                            @elseif(+$details->term == 2)
                                Second Term
                            @else
                                Third Term
                            @endif</h3>
                        <form method="post" action="{{route('term.change')}}">
                            @csrf
                            @method('PATCH')
                            <select class="form-control col-md-8" id="roles" name="term">
                                <option value="1">1st Term</option>
                                <option value="2">2nd Term</option>
                                <option value="3">3rd Term</option>
                            </select>

                            <br>
                            <button class="btn btn-primary" type="submit">Change Term</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-4">
                <div class="card h-10 border-secondary ">
                    <div class="card-body">
                        <h3 class="card-title">Current Year? {{$details->entry_year}} </h3>
                        <form method="post" action="{{route('year.change')}}">
                            @csrf
                            @method('PATCH')
                        <select class="form-control col-md-8" id="roles" name="entry_year">
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                        </select>
                        <br>
                        <button class="btn btn-primary" type="submit">Change Term</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title table-isactive" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('mode.toggle')}}">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input name="exam" hidden type="text" class="form-control" id="exam">
                            <button class="btn btn-outline-primary" type="submit">Change</button>
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
                var exam = button.data('exam')
                var mode = button.data('mode')
                var current_mode = button.data('currentmode') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Current Mode: ' + current_mode)
                modal.find('.modal-body').text('Are you sure you would like to switch to ' + mode)
                modal.find('.modal-footer input').val(exam)

            })
        </script>
    @endsection
</x-portal-layout>
