<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

    <title>Werkn Commerce - Vista Principal</title>

    <!-- vendor css -->
    <link href="{{ asset('lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.css') }}">

    @if(Auth::user()->color_mode == true)
    <link rel="stylesheet" href="{{ asset('assets/css/skin.dark.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.dashboard.css') }}">

    @php
        $site_config = Nowyouwerkn\WerknHub\Models\SiteConfig::first();
    @endphp

    <style>
        .image-table {
            width: 120px;
        }

        .image-table img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    @if($site_config->store_logo == NULL)
        <style type="text/css">
            .aside-logo {
                background: url("{{ asset('assets/img/logo.png') }}");
                background-position: center center;
                background-size: contain;
                background-repeat: no-repeat;
                width: 50%;
                margin: 0;
                position: relative;
                display: inline-block;

                text-indent: 110%;
                white-space: nowrap;
                overflow: hidden;
            }
        </style>
    @else
        <style type="text/css">
            .aside-logo {
                background: url("{{ asset('assets/img/' . $site_config->store_logo) }}");
                background-position: center center;
                background-size: contain;
                background-repeat: no-repeat;
                width: 50%;
                margin: 0;
                position: relative;
                display: inline-block;

                text-indent: 110%;
                white-space: nowrap;
                overflow: hidden;
            }
        </style>
    @endif

    @stack('stylesheets')
</head>
<body>
    <!-- Aside Navbar -->
    @include('werknhub::back.layouts.navbar')

    <div class="content ht-100v pd-0">
        <!-- Header -->
        @include('werknhub::back.layouts.header')

        <div class="content-body">
            <div class="container pd-x-0">
                <!-- Title -->
                @yield('title')
                @include('werknhub::back.layouts.partials._messages')
                <!-- Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
   
    <script src="{{ asset('assets/js/dashforge.js') }}"></script>
    <script src="{{ asset('assets/js/dashforge.aside.js') }}"></script>

    @stack('scripts')
</body>
</html>
