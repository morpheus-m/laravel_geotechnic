<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('page-title')</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="ThemeDesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

    <!-- morris css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/morris/morris.css')}}">

    <link href="{{asset('admin/assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}"
          rel="stylesheet"/>

    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

    @yield('styles')
</head>

<body class="fixed-left">
<!-- Loader -->
{{--<div id="preloader">--}}
{{--    <div id="status">--}}
{{--        <div class="spinner">--}}
{{--            <div class="rect1"></div>--}}
{{--            <div class="rect2"></div>--}}
{{--            <div class="rect3"></div>--}}
{{--            <div class="rect4"></div>--}}
{{--            <div class="rect5"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Begin page -->

<div style="padding-top: 20px">


    <div class="container">
       @yield('content')
        <!-- end row -->
    </div>
</div>

<!-- jQuery  -->
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/js/modernizr.min.js')}}"></script>
<script src="{{asset('admin/assets/js/detect.js')}}"></script>
<script src="{{asset('admin/assets/js/fastclick.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('admin/assets/js/waves.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.scrollTo.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>

<script src="{{asset('admin/assets/js/sweetalert2.min.js')}}"></script>
@yield('scripts')


</body>
</html>
