@extends('layout.website')

@section('title', __('website.home'))

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- Home Sections -->
        @for($i=0;$i<$homeSections;$i++)
            @if(!empty($categories[$i]))
                <div class="home-section p-t-170 p-b-70 " style="background-color: {{$categories[$i]->color}}">
                    <div class="container">
                        <div class="row">
                            @if(($i+1) % 2 == 0)
                                <div class="col-md-6" data-aos="fade-left" data-aos-once="true"
                                     data-aos-duration="1000">
                                    <div class="content">
                                        <h1>{{$categories[$i]->name}}</h1>
                                        <p>{{$categories[$i]->desc}}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-5 col-md-offset-1" data-aos-once="true" data-aos="fade-right"
                                 data-aos-duration="1000">
                                <div class="image">
                                    <img style="opacity: 0.7;" src="{{$categories[$i]->imageUrl}}" alt="{{$categories[$i]->name}}">
                                </div>
                            </div>

                            @if(($i+1) % 2 != 0)
                                <div class="col-md-6" data-aos="fade-left" data-aos-once="true"
                                     data-aos-duration="1000">
                                    <div class="content">
                                        <h1>{{$categories[$i]->name}}</h1>
                                        <p>{{$categories[$i]->desc}}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @livewire('website-category-products' , ['category_id' => $categories[$i]->id])
                </div>
            @endif
        @endfor
        <div class="container-fluid">
            <div class="row justify-content-center m-b-50">
                    <div class="col-12 m-b-50">
                        @livewire('website-products' , ['random' => true , "title" => __('website.latest_products')])
                    </div>

                <div class="col-md-9">
                    <div class="map-container">
                        <iframe class="map-iframe"
                                src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl={{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}&amp;q={{$lng}},{{$lat}}&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

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
@endpush
