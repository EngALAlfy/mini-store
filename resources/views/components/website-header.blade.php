<header id="header" class="" style="width: 100%!important;">
    <nav class="main-nav navbar navbar-expand-md" style="z-index: 999;">
        <div class="logo ml-4">
            <a href="/" class="scrollto"><img height="60" width="180" src="{{asset('assets/img/logo.png')}}" alt=""
                                              class="max-width: 100%;"></a>
        </div>

        <button class="navbar-toggler ml-auto mr-2" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <span class="dropdown mr-3 d-md-none">
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
        </span>


        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav">
                <li @class(['active' => Route::currentRouteName() == 'website.home'])><a
                        href="{{route('website.home')}}">@lang('website.home')</a></li>
                <li @class(['active' => Route::currentRouteName() == 'website.products.index'])><a
                        href="{{route('website.products.index')}}">@lang('website.products')</a></li>
                <li @class(['active' => Route::currentRouteName() == 'website.contact.create'])><a
                        href="{{route('website.contact.create')}}">@lang('website.contact_us')</a></li>

                @foreach($pages as $link)
                    <li @class(['active' => isset($page) && $page->id == $link->id])><a
                            href="{{route('website.pages.show' , $link)}}">{{$link->name}}</a></li>
                @endforeach



            </ul>
        </div>

        <span class="dropdown mr-3 d-none d-md-block">
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
        </span>
    </nav>
</header>
