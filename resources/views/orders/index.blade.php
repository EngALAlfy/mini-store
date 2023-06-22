@extends('layout.panel')

@section('title')
    @lang('all.orders')
@endsection

@section('page_title')
    @lang('all.orders')
@endsection


@section('breadcrumb_title')
    @lang('all.orders')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('orders' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
