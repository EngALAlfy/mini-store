@extends('layout.panel')

@section('title')
    @lang('all.pages')
@endsection

@section('page_title')
    @lang('all.pages')
@endsection


@section('breadcrumb_title')
    @lang('all.pages')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('pages' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
