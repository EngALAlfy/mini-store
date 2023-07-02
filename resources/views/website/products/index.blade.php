@extends('layout.website')

@section('title', __('website.products'))

@section('content')

    <!-- SECTION -->
    <div class="section m-t-120">
        <livewire:website-products></livewire:website-products>
    </div>
    <!-- /SECTION -->

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        // toastr
        @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
            toastr.options.rtl = true;
        @endif

            toastr.options.close = true;
        toastr.options.positionClass = "toast-bottom-left";
        toastr.options.progressBar = true;
        toastr.options.onHidden  = function() {
            // remove old toastr - bug for livewire
            $('#notification_script').remove();
        };
        toastr.options.onShown = function() {
            @if ($notification_sound != 'no_sound')
            var sound = new Howl({
                src: ["{{ asset('assets/sound/' . $notification_sound) }}"]
            });
            sound.play();
            @endif
        };
    </script>
@endpush
