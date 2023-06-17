@extends('layout.panel')

@section('title')
    @lang('all.sub_categories')
@endsection

@section('page_title')
    @lang('all.sub_categories')
@endsection


@section('breadcrumb_title')
    @lang('all.sub_categories')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('sub-categories' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
