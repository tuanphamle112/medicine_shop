<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts.css') }}" />
</head>
<body>

{{-- {{ $medicines->name }} --}}
    <!-- Start header -->
    @include('layouts.header')
    <!-- Sub navigation bar -->
    @yield('subnav-bar')
    <!-- End header -->
    <!-- Start content -->
    @yield('content')
    <h2>Page content</h2>
    
    <!-- End content -->
    <!-- Start footer -->
    @include('layouts.footer')
    <!-- End footer -->

    @include('layouts.library.footer-js')

    @yield('custom-javascript')
</body>
</html>

