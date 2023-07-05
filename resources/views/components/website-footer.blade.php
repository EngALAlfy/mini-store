<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-6 footer-info">
                    <h3>@lang('website.name')</h3>
                    <p>@lang('website.desc')</p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>@lang('website.links')</h4>
                    <ul>
                        <li><a href="{{url('/')}}">@lang('website.home')</a></li>
                        @foreach($pages as $page)
                            <li><a href="{{route('website.pages.show' , $page)}}">{{$page->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>@lang('website.contact_us')</h4>
                    <p>
                        <strong>{{$address}}</strong><br>
                        <strong>@lang('all.phone'):</strong>  {{$phone}}<br>
                        <strong>@lang('all.email'):</strong> {{$email}}<br>
                    </p>
                    <div class="social-links">
                        <a href="" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                        <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright p-b-20">
            <div class="float-md-left m-b-20"> @lang('website.copyright') &copy;
                <strong>
                    @lang('website.name')
                </strong>
                <script type="text/javascript">document.write(new Date().getFullYear());</script>
            </div>

            <div class="float-md-right">
                @php
                    $emojies = [12 , 13  , 15 ,16 ,19,21,22,25,26 , 36 , 38 , 67];
                    $emoji = '&#1285' . $emojies[rand(0 , count($emojies) - 1)];
                @endphp

                Made with {!! $emoji !!} by
                <a class="text-muted" href="https://alalfy.com">Alalfy</a>
            </div>
        </div>
    </div>
</footer>
