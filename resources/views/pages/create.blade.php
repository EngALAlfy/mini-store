@extends('layout.panel')

@section('title')
    @lang('all.add') @lang('all.page')
@endsection

@section('page_title')
    @lang('all.add') @lang('all.page')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">@lang('all.pages')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.add') @lang('all.page')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form method="post" action="{{ route('admin.pages.store') }}">

                    @csrf
                    @method('post')

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">@lang('all.name')</label>
                                <input value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="@lang('all.name')">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">@lang('all.content')</label>
                                <textarea id="content" name="content" class="@error('content') is-invalid @enderror" placeholder="@lang('all.content')">
                                {!! old('content') !!}
                                </textarea>
                                @error('content')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer justify-content-between">
                            <button type="reset" class="btn btn-default">@lang('all.cancel')</button>
                            <button type="submit" class="btn btn-primary">
                                @lang('all.save')
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/summernote/summernote-lite.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/adminLTE/plugins/summernote/summernote-lite.js') }}"></script>
    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <script src="{{ asset('assets/adminLTE/plugins/summernote/lang/summernote-ar-AR.js') }}"></script>
    @endif
    <script>
        $(function() {
            $('#content').summernote({
                placeholder:"@lang('all.content')...",
                lang: 'ar-AR',
                direction:'rtl',
                height:300,
            });
        })
    </script>
@endpush
