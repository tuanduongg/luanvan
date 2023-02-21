<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Home IUM</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('dist/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dist/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('dist/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/libs/sweet-alert2/sweetalert2.css') }}" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> --}}


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dist/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dist/js/config.js') }}"></script>

    {{-- datatables --}}


    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.css"/> --}}
    <link rel="stylesheet" href="{{ asset('dist/css/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/css/responsive.bootstrap5.css') }}" />
    <!-- Include Choices CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('layout.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('layout.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('layout.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- Core JS -->
    <!-- build:js dist/vendor/js/core.js -->
    <script src="{{ asset('dist/libs/jquery/jquery.js') }}"></script>
    {{-- datables --}}
    <script src="{{ asset('dist/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dist/libs/toast/ui-toasts.js') }}"></script>
    <script src="{{ asset('dist/libs/toast/toastr.js') }}"></script>
    <script src="{{ asset('dist/libs/sweet-alert2/sweetalert2.js') }}"></script>
    {{-- <script src="{{ asset('dist/libs/sweet-alert2/extended-ui-sweetalert2.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script> --}}
    <!-- endbuild -->
    {{--     
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
        --}}

    {{-- <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-html5-2.3.4/fc-4.2.1/fh-3.3.1/r-2.4.0/datatables.min.js">
    </script> --}}

    <script src="{{ asset('dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dist/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('dist/js/menu.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('dist/js/main.js') }}"></script>

    <script type="text/javascript" src="{{ asset('dist/js/datatables-bootstrap5.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @stack('scripts')
</body>

</html>
