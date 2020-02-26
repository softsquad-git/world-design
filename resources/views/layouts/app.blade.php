<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('meta')
        @yield('meta')
    @else
        <title>{{ config('app.meta.title') }}</title>
        <meta name="keywords" content="{{ config('app.meta.keywords') }}">
        <meta name="description" content="{{ config('app.meta.description') }}">
    @endif
<!-- TEMPlATE ASSETS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/front/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/front/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <script src="https://kit.fontawesome.com/5c8b33440b.js" crossorigin="anonymous"></script>
    <!-- END TEMPLATE ASSETS -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('custom-script')
</head>
<body>
<div id="app">
    @if(Session::has('message'))
        <div id="msg-session" class="fixed-top messages">
           {{ Session::get('message') }}
        </div>
    @endif
    @include('front.menu')

    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('front.newsletter')
@include('front.footer')
<!-- TEMPLATE -->
<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>

@yield('scripts')

<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/front/js/aos.js') }}"></script>
<script src="{{ asset('assets/front/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/front/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('assets/front/js/google-map.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
<!-- END -->
</body>
</html>
