<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('images/lgu.png') }}" type="image/x-icon">
    <title>Admin | {{ $title }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('adminfiles/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('adminfiles/assets/plugins/c3-master/c3.min.css') }}." rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('adminfiles/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminfiles/css/newstyle.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('adminfiles/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.rtl.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.default.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.mobile.all.min.css">

    <!-- <script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>   -->
    <!-- <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
             @include('admin._header')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
             @include('admin._sidebar')
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @if(session()->has('success'))
                    <div class="alert alert-success" style="position:absolute;right: 0; z-index: 5;">
                      {{ session()->get('success') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger" style="position:absolute;right: 0; z-index: 5;">
                      {{ session()->get('error') }}
                    </div>
                @endif
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                @yield('content')
            </div>
        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- <footer class="footer"> © 2017 Material Pro Admin by wrappixel.com </footer> -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('adminfiles/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.2.620/js/angular.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.2.620/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('adminfiles/assets/plugins/bootstrap/js/tether.min.js') }}"></script>
    <script src="{{ asset('adminfiles/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('adminfiles/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('adminfiles/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('adminfiles/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('adminfiles/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('adminfiles/js/custom.min.js') }}"></script>
    <script src="{{ asset('adminfiles/js/myjs.js') }}"></script>
    <!-- <script src="{{ asset('adminfiles/js/custom.js') }}"></script> -->
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
</body>

</html>
