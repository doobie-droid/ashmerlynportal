<x-portal-layout>
    @section('content')
        <br>
        @if(\Illuminate\Support\Facades\Session::has('success_message'))
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success_message')}}</div>
        @elseif(\Illuminate\Support\Facades\Session::has('error_message'))
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('error_message')}}</div>
        @endif
        @error('password')
        <div class="alert alert-danger">Your password does not match our records</div>
        @enderror
        <br>
        <p>
            <a class="btn btn-outline-success btn-block btn-circle float-right" data-toggle="collapse"
               href="#collapseAddDetails" role="button" aria-expanded="false" aria-controls="collapseAddDetails">
                <i class="fas fa-plus"></i>
            </a>
            <a class="btn btn-outline-dark" href="{{route('arm.edit')}}"
               aria-expanded="false">
                Sort Class Arms
            </a>
        </p>
        <div class="collapse " id="collapseAddDetails">
            <div class="card card-body">
                <div class="card-header" id="headingClass" data-toggle="collapse" href="#collapseAddClass"
                     aria-expanded="false" aria-controls="collapseAddClass">
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
                                        name="name">
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
                                        name="slug">
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
                <div class="card-header" id="headingArm" data-toggle="collapse" href="#collapseAddArm"
                     aria-expanded="false" aria-controls="collapseAddArm">
                    <a class="btn btn-link" role="button" data-toggle="collapse" href="#collapseAddArm"
                       aria-expanded="false" aria-controls="collapseAddArm">Create New Arm</a>
                </div>

                <div class="collapse" id="collapseAddArm" class="collapse show" aria-labelledby="headingArm"
                     data-parent="#collapseAddDetails">
                    <br>
                    <div class="card card-body">
                        <form action="{{route('arm.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Arm Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror "
                                       name="name" id="arm_name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="password">Confirm User Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror "
                                       name="password" id="password_arm">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Add Arm</button>
                        </form>
                    </div>
                    <br>
                </div>
                <div class="card-header" id="headingSubject" data-toggle="collapse" href="#collapseAddSubject"
                     aria-expanded="false"
                     aria-controls="collapseAddSubject">
                    <a class="btn btn-link" data-toggle="collapse" href="#collapseAddSubject" aria-expanded="false"
                       aria-controls="collapseAddSubject">Create New Subject</a>
                </div>

                <div class="collapse" id="collapseAddSubject" class="collapse show" aria-labelledby="headingSubject"
                     data-parent="#collapseAddDetails">
                    <br>
                    <div class="card card-body">
                        <form action="{{route('subject.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="subject_name">Subject Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror "
                                       name="name" id="subject_name" placeholder="Enter the subject you want to add...">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="password">Confirm User Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror "
                                       name="password" id="password_subject">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Add Arm</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div id="accordion">
            @if($actual_classes)
                @foreach($actual_classes as $class)
                    <div class="card shadow">
                        <div class="card-header" id="{{'heading'.$class->slug}}" data-toggle="collapse"
                             data-target="{{'#collapse'.$class->slug}}" aria-controls="{{'collapse'.$class->slug}}">
                            <h5 class="mb-0">
                                <button class="btn btn-link"
                                        aria-expanded="false">
                                    {{'Year '.$class->slug}}
                                </button>
                            </h5>
                        </div>

                        <div id="{{'collapse'.$class->slug}}" class="collapse"
                             aria-labelledby="{{'heading'.$class->slug}}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-isactive">
                                        <caption>List of subjects by class</caption>
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Modify</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subjects as $subject)
                                            <tr>
                                                <th><input type="checkbox" onclick="return false"
                                                           @if($class->subjects->contains($subject)) checked @endif >
                                                </th>
                                                <td class="  @if(!$class->subjects->contains($subject)) row-inactive @endif">{{$subject->name}}</td>
                                                @if($class->subjects->contains($subject))
                                                    <td>
                                                        <form method="post" action="{{route('subject.detach',$class->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input hidden type="text" name="id" value="{{$subject->id}}">
                                                            <button type="submit" class="btn btn-danger btn-circle "><i
                                                                    class="fas fa-solid fa-plus fa-trash fa-bounce"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form method="post" action="{{route('subject.attach',$class->id)}}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input hidden  name="id" value="{{$subject->id}}">
                                                            <button type="submit" class="btn btn-success btn-circle"><i
                                                                    class="fas fa-plus"></i></button>

                                                        </form>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif

        </div>
    @endsection

</x-portal-layout>

