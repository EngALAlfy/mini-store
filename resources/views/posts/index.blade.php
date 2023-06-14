@extends('layout.panel')

@section('title')
    @lang('all.posts')
@endsection

@section('page_title')
    @lang('all.posts')
@endsection


@section('breadcrumb_title')
    @lang('all.posts')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('posts' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
