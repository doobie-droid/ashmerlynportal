<x-portal-layout>
    @section('content')
        <br>
        @if(\Illuminate\Support\Facades\Session::has('success_message'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success_message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('error_message'))
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('error_message')}}</div>
        @endif
        <br>
        <p>
            <a class="btn btn-outline-success btn-block btn-circle float-right" data-toggle="collapse"
               href="#collapseAddDetails" role="button" aria-expanded="false" aria-controls="collapseAddDetails">
                <i class="fas fa-plus"></i>
            </a>
            <button class="btn btn-outline-dark" type="button" data-toggle="collapse" data-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                Sort Class Arms
            </button>
        </p>
        <div class="collapse" id="collapseAddDetails">
            <div class="card card-body">
                <div class="card-header" id="headingClass">
                    <a class="btn btn-link" role="button" data-toggle="collapse" href="#collapseAddClass"
                       aria-expanded="true" aria-controls="collapseAddClass">Create New Class</a>

                </div>
                <div class="collapse" id="collapseAddClass" class="collapse show" aria-labelledby="headingClass"
                     data-parent="#collapseAddDetails">
                    <br>
                    <div class="card card-body">
                        <form action="{{route('class.store')}}" method="POST">
                            @csrf


                            <div class="form-group">
                                <label for="name">Class Name</label>
                                <select class="form-control @error('class_name') is-invalid @enderror" id="class_name"
                                        name="class_name">
                                    @foreach($possible_classes as $single_class)
                                        <option value="{{$single_class}}">{{$single_class}}</option>
                                    @endforeach
                                </select>
                                @error('class_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="name">Confirm Class</label>
                                <select class="form-control @error('class_slug') is-invalid @enderror" id="class_slug"
                                        name="class_slug">
                                    @foreach($possible_classes_words as $single_class)
                                        <option value="{{$single_class}}">{{$single_class}}</option>
                                    @endforeach
                                </select>
                                @error('class_slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="name">Admin Token</label>
                                <input type="text"
                                       class="form-control @error('administratortoken') is-invalid @enderror "
                                       name="administratortoken"
                                       id="token">
                                @error('administratortoken')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Add Class</button>
                        </form>
                    </div>
                    <br>
                </div>
                <div class="card-header" id="headingArm">
                    <a class="btn btn-link" role="button" data-toggle="collapse" href="#collapseAddArm"
                       aria-expanded="false" aria-controls="collapseAddArm">Create New Arm</a>
                </div>

                <div class="collapse" id="collapseAddArm" class="collapse show" aria-labelledby="headingArm"
                     data-parent="#collapseAddDetails">
                    <br>
                    <div class="card card-body">Form For New Arm</div>
                    <br>
                </div>
                <div class="card-header" id="headingSubject">
                    <a class="btn btn-link" data-toggle="collapse" href="#collapseAddSubject" aria-expanded="false"
                       aria-controls="collapseAddSubject">Create New Subject</a>
                </div>

                <div class="collapse" id="collapseAddSubject" lass="collapse show" aria-labelledby="headingSubject"
                     data-parent="#collapseAddDetails">
                    <br>
                    <div class="card card-body">Form For New Subject</div>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div id="accordion">
            @if($actual_classes)
                @foreach($actual_classes as $class)
                <div class="card shadow">
                    <div class="card-header" id="{{'heading'.$class->slug}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="{{'#collapse'.$class->slug}}"
                                    aria-expanded="false" aria-controls="{{'collapse'.$class->slug}}">
                                {{'Year '.$class->slug}}
                            </button>
                        </h5>
                    </div>

                    <div id="{{'collapse'.$class->slug}}" class="collapse" aria-labelledby="{{'heading'.$class->slug}}" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid.
                            3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                            anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                            heard
                            of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            @endif

        </div>
    @endsection

</x-portal-layout>

