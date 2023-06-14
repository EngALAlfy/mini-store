@extends('layout.website')


@section('title', $post->name )

@section('content')

    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
        <div class="page-header-bg"
            style="background-repeat: no-repeat; background-size: cover; background-position: center; background-image: url('{{ $post->image }}');"
            data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="{{ route('website.categories.show', $post->category) }}">{{ $post->category->name }}</a>
                    </div>
                    <h1>{{ $post->name }}</h1>
                    <ul class="post-meta">
                        <li>{{ $post->state->name }}</li>

                        <li><i class="fa fa-dollar"></i> {{ $post->price->name }}</li>
                    </ul>
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
                        <div class="col-12">
                            <img class="img-fluid w-100" src="{{ $post->image }}" alt="{{ $post->name }}">
                        </div>
                        <div class="col-12 m-t-40">{!! $post->content !!}</div>
                        @isset($post->url)
                            <div class="col-12 m-t-20">
                                <a href="{{ $post->url }}" class="btn btn-lg btn-success">@lang('website.book')</a>
                            </div>
                        @endisset
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
