@extends('layout.blank')

@section('title')
    {{ $page->name }}
@endsection

@section('content')
    <div class="container-fluid p-t-40 p-b-40 p-l-40 p-r-40">
        <div class="row">
            <div class="col-12 text-center">
                <h1>
                    {{ ucfirst($page->name) }}
                </h1>
            </div>
            <div class="col-12">
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection
