<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('landingpages/fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('landingpages/fonts/flaticon/font/flaticon.css') }}" />

    <link rel="stylesheet" href="{{ asset('landingpages/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('landingpages/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('landingpages/css/style.css') }}" />

    <title>
        Lab TI - {{ $title }}
    </title>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('landingpages.layouts.navbar')

    {{-- start hero --}}
    <div class="hero page-inner overlay" style="background-image: url('{{ asset('landingpages/images/hero_bg_3.jpg') }}')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                @yield('hero')
            </div>
        </div>
    </div>
    {{-- end hero --}}

    @yield('content')

    @include('landingpages.layouts.footer')
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('landingpages/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landingpages/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('landingpages/js/aos.js') }}"></script>
    <script src="{{ asset('landingpages/js/navbar.js') }}"></script>
    <script src="{{ asset('landingpages/js/counter.js') }}"></script>
    <script src="{{ asset('landingpages/js/custom.js') }}"></script>
</body>

</html>
