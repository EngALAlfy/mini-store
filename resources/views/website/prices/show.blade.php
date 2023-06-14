@extends('layout.website')


@section('title', $price->name )

@section('content')

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 text-center">
                    <h1 class="text-uppercase">{{ $price->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="post post-row">
                                <a class="post-img" href="{{ route('website.posts.show', $post) }}"><img
                                        src="{{ $post->image }}" alt="{{ $post->name }}"></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a
                                            href="{{ route('website.categories.show', $post->category) }}">{{ $post->category->name }}</a>
                                    </div>
                                    <h3 class="post-title"><a
                                            href="{{ route('website.posts.show', $post) }}">{{ $post->name }}</a></h3>
                                    <ul class="post-meta">
                                        <li>{{ $post->price->name }}</li>
                                    </ul>
                                    <div class="post-category">
                                        <a
                                            href="{{ route('website.states.show', $post->state) }}">{{ $post->state->name }}</a>
                                    </div>

                                    @isset($post->url)
                                        <a href="{{ $post->url }}" class="btn btn-success">@lang('website.book')</a>
                                    @endisset

                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                            </div>
                        @endforelse


                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="col-md-4">

                    <x-website-sidebar />

                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/summernote/summernote-lite.css') }}">
@endpush
