@extends('layout.website')

@section('title', __('website.home'))

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



@endsection

@push('styles')
@livewireStyles()
@endpush

@push('scripts')
    @livewireScripts()
@endpush
