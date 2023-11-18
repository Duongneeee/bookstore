<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mannatthemes.com/zoogler/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Sep 2023 07:55:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Zoogler - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div><!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        @include('parts.admin.sidebar')
        <!-- Left Sidebar End -->
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Top Bar Start -->
                @include('parts.admin.header')
                <!-- Top Bar End -->
                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- container -->
                </div><!-- Page content Wrapper -->
            </div><!-- content -->
            @include('parts.admin.footer')
        </div><!-- End Right content here -->
    </div><!-- END wrapper -->
    <!-- jQuery  -->
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.min.js')}}"></script>
    <script src="{{asset('backend/js/detect.js')}}"></script>
    <script src="{{asset('backend/js/fastclick.js')}}"></script>
    <script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backend/js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('backend/js/waves.js')}}"></script>
    <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('backend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('backend/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('backend/pages/dashboard.js')}}"></script><!-- App js -->
    <script src="{{asset('backend/js/app.js')}}"></script>
    <script src="{{asset('backend/plugins/alertify/js/alertify.js')}}"></script>
    <script src="{{asset('backend/pages/alertify-init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('js')
    {{-- @stack('scripts') --}}
    <script>
        const forms = document.querySelectorAll('.form-all');
      forms.forEach(form => {
        form.addEventListener('click', (e) => {
            e.preventDefault();
            const submitform = e.target.closest('form');
            Swal.fire({
             title: 'Bạn chắc chắn muốn xóa không?',
             text: "Dữ liệu sẽ bị xóa vĩnh viễn",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Vâng, tôi đồng ý!'
            }).then((result) => {
              if (result.isConfirmed) {
                 submitform.submit();
                }
            })
        })
      });

    </script>
    

</body>
<!-- Mirrored from mannatthemes.com/zoogler/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Sep 2023 07:56:18 GMT -->

</html>