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
           <br>
            <br>
        </p>
        <div class="collapse show " id="collapseAddDetails">
            <div class="card card-body">
                <div class="card-header" id="headingArm">
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
                <div class="card-header" id="headingSubject">
                    <a class="btn btn-link" data-toggle="collapse" href="#collapseAddSubject" aria-expanded="false"
                       aria-controls="collapseAddSubject">Create New Subject</a>
                </div>

                <div class="collapse show" id="collapseAddSubject" class="collapse show" aria-labelledby="headingSubject"
                     data-parent="#collapseAddDetails">
                    <br>
                    <div class="card card-body"> <form action="{{route('subject.store')}}" method="POST">
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
                            <button class="btn btn-primary" type="submit">Add Subject <i class="fas fa-plus"></i></button>
                        </form></div>
                    <br>
                </div>
            </div>
        </div>
        <br>

    @endsection

</x-portal-layout>


