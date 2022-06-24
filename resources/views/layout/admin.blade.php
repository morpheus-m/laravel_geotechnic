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

    <link rel="stylesheet" href="{{asset('admin/assets/css/jquery.dataTables.min.css')}}">

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
<div id="wrapper">

<!-- Begin : SideBar -->
@include('admin.partials.sidebar')
<!-- End : SideBar -->
    <!-- Start right Content here -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <!-- Top Bar Start -->
        @include('admin.partials.topbar')
        <!-- Top Bar End -->
            <div class="page-content-wrapper">
                <div class="container-fluid  p-0">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('admin.partials.footer')

    </div>
    <!-- End Right content here -->
</div>
<!-- END wrapper -->

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

{{--<script src="{{asset('admin/assets/js/jquery-3.5.1.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/js/jquery.dataTables.min.js')}}"></script>--}}


<!--Morris Chart-->
<script src="{{asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>

<!-- dashboard js -->
<script src="{{asset('admin/assets/pages/dashboard.int.js')}}"></script>
<script src="{{asset('admin/assets/pages/form-advanced.js')}}"></script>
<!-- Dropzone js -->
<script src="{{asset('admin/assets/plugins/dropzone/dist/dropzone.js')}}"></script>

<script src="{{asset('admin/assets/js/sweetalert2.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>

@yield('scripts')



</body>
</html>
