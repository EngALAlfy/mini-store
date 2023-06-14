@extends('layout.panel')

@section('title')
    @lang('all.category') : {{ $category->name }}
@endsection

@section('page_title')
    @lang('all.category') : {{ $category->name }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">@lang('all.categories')</a></li>
@endpush

@section('breadcrumb_title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @livewire('sub-categories' , ['delete_dialog' => $delete_dialog , 'category_id' => $category->id])
            </div>
        </div>
    </div>
@endsection
