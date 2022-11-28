<head>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <title>Error || Ash Merlyn Portal</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<br>
<br>

<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="405">405</div>
        <p class="lead text-gray-800 mb-5">Method Not Allowed</p>
        <p class="text-gray-500 mb-0">You can not access this page , Go back to previous page and resubmit your form</p>
        <a href="{{route('home')}}">&larr; Back to Dashboard</a>
    </div>

</div>
