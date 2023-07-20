<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ $title }}</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('dashboardpages/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('dashboardpages.layouts.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('dashboardpages.layouts.header')
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dashboardpages/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboardpages/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboardpages/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dashboardpages/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('dashboardpages/assets/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>
