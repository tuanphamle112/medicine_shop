<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/slick-carousel/slick/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/slick-carousel/slick/slick.css') }}" />
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts.css') }}" />
    <link href="{{ asset('bower_components/bootstrap-star-rating/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('bower_components/bootstrap-star-rating/css/theme-krajee-svg.css') }}" type="text/css" />
</head>
<body>
    <div class="wrap-page">
        <!-- Start header -->
        @include('layouts.header')
        <!-- Sub navigation bar -->
        @yield('subnav-bar')
        <!-- End header -->
        <!-- Start content -->
        @yield('content')
        <!-- End content -->
        <!-- Start footer -->
        @include('layouts.footer')
        <!-- End footer -->
    </div>


    @include('layouts.library.footer-js')
    @yield('custom-javascript')
</body>
</html>

