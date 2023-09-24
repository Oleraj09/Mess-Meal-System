<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/') }}assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/styles.min.css" />
</head>

<body>
    @include('sweetalert::alert')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('custom.inc.sidebar')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('custom.inc.header')
            <div class="container-fluid">
                @yield('page')
                @include('custom.inc.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('/') }}assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}assets/js/sidebarmenu.js"></script>
    <script src="{{ asset('/') }}assets/js/app.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="{{ asset('/') }}assets/js/dashboard.js"></script>
    

</body>

</html>
