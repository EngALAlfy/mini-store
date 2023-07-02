<header id="header" class="fixed-top">
    <div class="container">

        <div class="logo float-left">
            <a href="/" class="scrollto"><img height="60" width="60"  src="{{asset('assets/img/logo.png')}}" alt="" class="max-width: 100%;"></a>
        </div>
        <nav class="main-nav">
            <ul>
                <li @class(['active' => Route::currentRouteName() == 'website.home'])><a href="{{route('website.home')}}" >@lang('website.home')</a></li>
                <li @class(['active' => Route::currentRouteName() == 'website.products.index'])><a href="{{route('website.products.index')}}" >@lang('website.products')</a></li>
                <li @class(['active' => Route::currentRouteName() == 'website.contact.create'])><a href="{{route('website.contact.create')}}">@lang('website.contact_us')</a></li>

                <li class=" dropdown float-right">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i
                            class="flag-icon flag-icon-{{ strtolower(str_replace(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() . '_', '', \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleRegional())) }}"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                        @foreach (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a @class([
                                'dropdown-item',
                                'active' =>
                                    \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() ==
                                    $localeCode,
                            ]) rel="alternate" hreflang="{{ $localeCode }}"
                               href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <i
                                    class="flag-icon flag-icon-{{ strtolower(str_replace($localeCode . '_', '', $properties['regional'])) }} mr-2"></i>{{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</header>
