@extends('layout.panel')

@section('title')
    @lang('all.sub_category') : {{ $subcategory->name }}
@endsection

@section('page_title')
    @lang('all.category') : {{ $subcategory->name }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">@lang('all.categories')</a></li>

    <li class="breadcrumb-item"><a
            href="{{ route('admin.categories.show', $subcategory->category_id) }}">{{ $subcategory->category->name }}</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.subcategories.index') }}">@lang('all.sub_categories')</a></i>
    @endpush

    @section('breadcrumb_title')
        {{ $subcategory->name }}
    @endsection

    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @livewire('posts', ['delete_dialog' => $delete_dialog, 'category_id' => $subcategory->category->id, 'sub_category_id' => $subcategory->id])
                </div>
            </div>
        </div>
    @endsection
