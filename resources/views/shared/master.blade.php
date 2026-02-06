<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png')}}">
    <title>JUBITA MS</title>
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('plugins/bower_components/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="{{route('dashboard')}}">
                    <b>
                        <center><img src="{{asset('plugins/images/logo2.png')}}" alt="home" style="width:100px; height:auto;"></center>
                       <!-- <img src="plugins/images/logo.png" alt="home" class="dark-logo" />  -->
                     </b>
                    </a>
                </div>
            </div>
        </nav>
        @include('shared.sidebar')
        <div id="page-wrapper">
            @yield('content')
            <footer class="footer text-center"> {{date('Y')}} &copy; JUBITA</footer>
        </div>
        @if(session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '{{ session('success') }}',
                            showConfirmButton: false, 
                            timer: 3000 
                        });
                    });
                </script>
            @endif

            @if(session('fail'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: '{{ session('fail') }}',
                            showConfirmButton: false, 
                            timer: 3000 
                        });
                    });
                </script>
            @endif
    </div>
    <!-- jQuery -->
    <script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/waves.js')}}"></script>
    <script src="{{asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{asset('plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/morrisjs/morris.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/dashboard1.js')}}"></script>
    <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/sweetalert/sweetalert2.min.js')}}"></script>
    <!-- SweetAlert2 CSS -->

<!-- SweetAlert2 JS -->
    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to IMPREST',
            text: 'Effective manage all data in one system.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script> -->

    <script src="{{asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
    @yield('scripts')

    

</body>

</html>
