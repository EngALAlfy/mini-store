@extends('layout.panel')

@section('title')
    @lang('all.states')
@endsection

@section('page_title')
    @lang('all.states')
@endsection


@section('breadcrumb_title')
    @lang('all.states')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('states' , ['delete_dialog' => $delete_dialog])
            </div>
        </div>
    </div>
@endsection
