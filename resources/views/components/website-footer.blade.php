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
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            @lang('website.copyright') &copy;
            <strong>
                <a class="text-muted" href="https://alalfy.com">Alalfy</a>
            </strong>
            <script type="text/javascript">document.write(new Date().getFullYear());</script>
        </div>
    </div>
</footer>
