<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'SmartHealth Tracker')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/assets/css/bootstrap.min.css'])
    @vite(['resources/assets/css/magnific-popup.css'])
    @vite(['resources/assets/css/swiper-bundle.min.css'])
    @vite(['resources/assets/css/slick.css'])
    @vite(['resources/assets/css/default-icons.css'])
    @vite(['resources/assets/css/default.css'])
    @vite(['resources/assets/css/sal.css'])
    @vite(['resources/assets/css/tg-cursor.css'])
    @vite(['resources/assets/css/main.css'])

    <!-- Custom CSS for footer text visibility -->
    <style>
        /* Fix footer text visibility */
        .footer {
            background-color: #1a1a1a;
            color: #ffffff;
        }

        .footer__widget p {
            color: #cccccc !important;
        }

        .footer__widget h4,
        .footer__widget h5,
        .footer__widget h6 {
            color: #ffffff !important;
        }

        .footer__widget a {
            color: #cccccc !important;
        }

        .footer__widget a:hover {
            color: #ffffff !important;
        }

        .footer__social a {
            color: #cccccc !important;
        }

        .footer__social a:hover {
            color: #ffffff !important;
        }

        .footer__copyright {
            color: #cccccc !important;
        }

        .footer__copyright a {
            color: #cccccc !important;
        }

        .footer__copyright a:hover {
            color: #ffffff !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
<!-- Preloader -->
<div id="preloader">
    <div id="loader" class="loader">
        <div class="loader-container">
            <div class="loader-icon">
                <img src="{{ Vite::asset('resources/assets/img/logo/preloader.svg') }}" alt="Preloader">
            </div>
        </div>
    </div>
</div>
<!-- Preloader-end -->

<!-- Scroll-top -->
<button class="scroll__top scroll-to-target" data-target="html">
    <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11 6L1 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M6 11L1 6L6 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</button>
<!-- Scroll-top-end -->

<!-- Header -->
@include('shared.partials.frontoffice-header')

<!-- Main Content -->
<main class="main-area fix">
    @yield('content')
</main>

<!-- Footer -->
@include('shared.partials.frontoffice-footer')

@vite(['resources/assets/js/vendor/jquery-3.6.0.min.js'])
@vite(['resources/assets/js/bootstrap.min.js'])
@vite(['resources/assets/js/jquery.magnific-popup.min.js'])
@vite(['resources/assets/js/jquery.appear.js'])
@vite(['resources/assets/js/swiper-bundle.min.js'])
@vite(['resources/assets/js/slick.js'])
@vite(['resources/assets/js/jquery.marquee.min.js'])
@vite(['resources/assets/js/jquery.counterup.min.js'])
@vite(['resources/assets/js/tg-cursor.min.js'])
@vite(['resources/assets/js/jquery.easing.js'])
@vite(['resources/assets/js/sal.js'])
@vite(['resources/assets/js/ajax-form.js'])
@vite(['resources/assets/js/main.js'])

@stack('frontoffice-scripts')
</body>
</html>