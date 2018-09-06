<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700%7cPlayfair+Display:400,700,400i,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('/css/front.css') }}">

    <!-- <link rel="stylesheet" type="text/css" href="css/rtl.css" media="all"/> -->
</head>



<body class="preload">
<div class="wrap">
    @includeIf('blocks.header')
    <!-- End Header -->
    @yield('content')
    <!-- End Content -->
    @includeIf('blocks.footer')
    <!-- End Footer -->
    <div class="wishlist-mask">
        <div class="wishlist-popup">
            <span class="popup-icon"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
            <p class="wishlist-alert">"BW Store Product" was added to wishlist</p>
            <div class="wishlist-button">
                <a href="#">Continue Shopping (<span class="wishlist-countdown">5</span>)</a>
                <a href="#">Go To Shopping Cart</a>
            </div>
        </div>
    </div>
    <!-- End Wishlist Mask -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_four"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_one"></div>
            </div>
        </div>
    </div>
    <!-- End Preload -->
    <a href="#" class="scroll-top dark"><i class="fa fa-angle-up"></i></a>
</div>
<script src="js/libs/jquery-3.2.1.min.js"></script>
<script src="{{ mix('/js/front.js') }}"></script>

</body>
</html>
