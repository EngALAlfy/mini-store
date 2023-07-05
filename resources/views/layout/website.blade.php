<!DOCTYPE html>
<html lang="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}"
      dir="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ __('website.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/flag-icon-css/css/flag-icon.css') }}">

    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/website/css/rtl/bootstrap.min.css') }}">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/website/css/rtl/style.css') }}"/>
    @else
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}"/>
    @endif

    <!-- dims (margins and paddings -->
    <link rel="stylesheet" href="{{ asset('assets/custom/css/dims.css') }}">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/website/css/font-awesome.min.css') }}">
    {{-- image previewd zoom --}}
    <link rel="stylesheet" href="{{asset('assets/custom/css/image-preview.css')}}">
    @livewireStyles

    @stack('styles')

    @include('includes.fonts')

    <!-- toastr at first of the page : important -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/toastr/toastr.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.js') }}"></script>

</head>

<body>

<x-website-header/>

@yield('content')

<x-website-footer/>

<script src="{{ asset('assets/website/js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('assets/website/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
@livewireScripts

@stack('modals')

@stack('scripts')
{{-- image previewd zoom --}}
<script src="{{asset('assets/custom/js/image-preview.js')}}"></script>

<script>
    $(function () {
        initializeImagePreview();
    })
</script>

</body>

</html>
