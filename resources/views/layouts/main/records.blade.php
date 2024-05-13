<!DOCTYPE html>
<html lang="en" lang_2="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- doccure/  30 Nov 2019 04:11:34 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pharmacy Patient Records</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{asset('assets/img/icon.png')}}" rel="icon">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('assets/js/respond.min.js')}}"></script>
		<![endif]-->
    <!-- Fontawesome CSS -->


    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('adminassets/css/feathericon.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    @stack('styles')

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @yield('main')

    </div>
    
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Sticky Sidebar JS -->
    <script src="{{asset('plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
    <script src="{{asset('plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
    
    <!-- Datatables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Slick JS -->
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    
</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->

</html>