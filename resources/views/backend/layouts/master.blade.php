<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Micro Midea')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/common_assets/libs/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/backend/css/dashboard.min.css') }}" rel="stylesheet">

    @stack('css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        @includeIf('backend.layouts.partials.sidebar')
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @includeIf('backend.layouts.partials.topbar')

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @hasSection('content')
                        @yield('content')
                    @endIf

                    @sectionMissing('content')
                        <div class="row align-items-center justify-content-center" style="height: 80vh">
                            <div class="col-md-12">
                                <h2 class="text-center text-uppercase font-weight-bold display-5 alert alert-danger alert-heading">No content
                                    Found</h2>
                            </div>
                        </div>
                    @endIf
                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @includeIf('backend.layouts.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/common_assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/common_assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/common_assets/libs/jquery/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/backend/js/dashboard.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/backend/libs/chartJs/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/backend/libs/chartJs/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/chartJs/chart-pie-demo.js') }}"></script>

    @stack('js')

</body>

</html>