@extends('layout.panel')

@section('title')
    @lang('all.prices')
@endsection

@section('page_title')
    @lang('all.prices')
@endsection


@section('breadcrumb_title')
    @lang('all.prices')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('prices' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
