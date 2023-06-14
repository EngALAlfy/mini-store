<!-- HEADER -->
<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <div class="row">
                    <!-- logo -->
                    <div class="col-md-4 col-sm-12 m-t-20 m-b-10">
                        <a href="{{ url('/') }}" class="logo my-auto"><img src="{{ asset('assets/img/logo.png') }}"
                                alt="{{ __('website.' . env('APP_NAME')) }}"></a>
                        <br>
                        <p>@lang('website.desc')</p>
                    </div>
                    <!-- /logo -->
                    <!-- Ad widget -->
                    <div class=" col-md-8 col-sm-12 py-4 text-center">
                        {!! $header_ad !!}
                    </div>
                    <!-- /Ad widget -->

                </div>
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom" style="  background-color: #1b1c1e;">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li><a style=" color: white;" href="{{ url('/') }}">@lang('website.home')</a></li>

                    @foreach ($categories as $category)
                        <li><a style=" color: white;"
                                href="{{ route('website.categories.show', $category) }}">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

    </div>
    <!-- /NAV -->
</header>
<!-- /HEADER -->
