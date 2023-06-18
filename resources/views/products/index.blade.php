@extends('layout.panel')

@section('title')
    @lang('all.products')
@endsection

@section('page_title')
    @lang('all.products')
@endsection


@section('breadcrumb_title')
    @lang('all.products')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('products' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
