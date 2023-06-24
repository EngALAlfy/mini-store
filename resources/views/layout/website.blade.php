<!DOCTYPE html>
<html lang="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}"
    dir="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ __('website.'.env('APP_NAME')) }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">

    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/website/css/rtl/bootstrap.min.css') }}">
    @else
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">
    @endif

    <!-- dims (margins and paddings -->
    <link rel="stylesheet" href="{{ asset('assets/custom/css/dims.css') }}">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}" />

    @stack('styles')

    @include('includes.fonts')

</head>

<body>

    <x-website-header />

    @yield('content')

    <x-website-footer />

    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <script src="{{ asset('assets/website/js/rtl/jquery-3.3.1.slim.min.js') }}"></script>
        <script src="{{ asset('assets/website/js/rtl/popper.min.js') }}"></script>
        <script src="{{ asset('assets/website/js/rtl/bootstrap.min.js') }}"></script>
    @else
        <script src="{{ asset('assets/website/js/rtl/jquery-3.3.1.slim.min.js') }}"></script>
        <script src="{{ asset('assets/website/js/rtl/popper.min.js') }}"></script>
        <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    @endif
    @stack('scripts')
</body>

</html>
