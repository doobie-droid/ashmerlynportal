<x-portal-layout>

@section('content')
    <div>Yup this is the homepage</div>
    <h1>{{'The boy has a username of '.$loggedinuser->username.' and a first name of'.$loggedinuser->firstname}} </h1>
    @endsection

</x-portal-layout>
