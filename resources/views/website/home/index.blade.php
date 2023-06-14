@extends('layout.website')


@section('title', __('website.home'))

@section('content')


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8">
                    @livewire('website-posts')
                </div>
                <div class="col-md-4">

                    <x-website-sidebar />

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
