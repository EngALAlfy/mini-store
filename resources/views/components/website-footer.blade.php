<footer class="footer">
    <div class="container m-t-5">
        <p> @lang('website.copyright') &copy; {{\Carbon\Carbon::now()->year}}</p>
        <p>
            @foreach($pages as $i => $page)
                <span><a class="text-muted" href="{{route('website.pages.show' , $page)}}" target="_blank">{{ucfirst($page->name)}}</a></span>
                <span  class="text-muted">{{ $i+1 < $pages->count() ? '|' : '' }}</span>
            @endforeach
        </p>
    </div>
</footer>
