<!-- FOOTER -->
<footer id="footer">
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center m-b-30">
                {!! $footer_ad !!}
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-3">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('assets/img/logo.png') }}"
                                alt="{{ __('website.' . env('APP_NAME')) }}"></a>
                    </div>
                    <p>@lang('website.desc')</p>
                    <ul class="contact-social">
                        <li><a href="{{ $facebook }}" class="social-facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="{{ $youtube }}" class="social-google-plus"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li><a href="{{ $instagram }}" class="social-instagram"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">@lang('website.categories')</h3>
                    <div class="category-widget">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('website.categories.show', $category) }}">{{ $category->name }}
                                        <span>{{ $category->posts_count }}</span> </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">@lang('website.states')</h3>
                    <div class="category-widget">
                        <ul>
                            @foreach ($states as $state)
                                <li><a href="{{ route('website.states.show', $state) }}">{{ $state->name }}
                                        <span>{{ $state->posts_count }}</span> </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">@lang('website.prices')</h3>
                    <div class="tags-widget">
                        <ul>
                            @foreach ($prices as $price)
                                <li><a href="{{ route('website.prices.show', $price) }}">{{ $price->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="footer-bottom row">
            <div class="col-md-6 col-md-push-6">
                <ul class="footer-nav">
                    <li><a href="{{ url('/') }}">@lang('website.home')</a></li>
                    <li><a href="{{ route('website.contact.create') }}">@lang('all.contact_us')</a></li>
                    @foreach ($pages as $page)
                        <li><a href="{{ route('website.pages.show', $page) }}">{{ $page->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6  col-md-pull-6">
                <div class="footer-copyright">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                        href="https://alalfy.com" target="_blank">alalfy</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->
