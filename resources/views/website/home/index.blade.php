@extends('layout.website')

@section('title', __('website.home'))

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- Home Section 1 -->
        @if(!empty($categories[0]))
            <div class="home-section p-t-170 p-b-70 " data-aos-once="true" data-aos="fade-up" data-aos-duration="1000"
                 data-aos-delay="400" style="background-color: {{$categories[0]->color}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1" data-aos-once="true" data-aos="fade-right" data-aos-duration="1000">
                            <div class="image">
                                <img src="{{$categories[0]->image}}" alt="Image Placeholder">
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-left" data-aos-once="true" data-aos-duration="1000">
                            <div class="content">
                                <h1>{{$categories[0]->name}}</h1>
                                <p>{{$categories[0]->desc}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-t-5 m-b-5">
                        <div class="col-12 text-center m-b-15">
                            <h3>@lang('website.products')</h3>
                        </div>
                        @foreach($categories[0]->products()->limit(4)->get() as $product)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="product-card  bg-dark" data-category="category1">
                                    <img src="{{$product->image}}" alt="{{$product->name}}" width="150" height="150">
                                    <h3>{{$product->name}}</h3>
                                    <p>{{$product->getPrice()}}</p>
                                    <button class="btn btn-primary m-t-10" data-toggle="modal" data-target="#orderModal">
                                        @lang('website.order_now')
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Home Section 2 -->
        @if(!empty($categories[1]))
            <div class="home-section p-t-70 p-b-70 " data-aos-once="true" data-aos="fade-up" data-aos-duration="1000"
                 data-aos-delay="400" style="background-color: {{$categories[1]->color}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" data-aos-once="true" data-aos="fade-left" data-aos-duration="1000">
                            <div class="content">
                                <h1>{{$categories[1]->name}}</h1>
                                <p>{{$categories[1]->desc}}</p>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1" data-aos-once="true" data-aos="fade-right" data-aos-duration="1000">
                            <div class="image">
                                <img src="{{$categories[1]->image}}" alt="Image Placeholder">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-t-5 m-b-5">
                        <div class="col-12 text-center m-b-15">
                            <h3>@lang('website.products')</h3>
                        </div>
                        @foreach($categories[1]->products()->limit(4)->get() as $product)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="product-card  bg-dark" data-category="category1">
                                    <img src="{{$product->image}}" alt="{{$product->name}}" width="150" height="150">
                                    <h3>{{$product->name}}</h3>
                                    <p>{{$product->getPrice()}}</p>
                                    <button class="btn btn-primary m-t-10"  data-toggle="modal" data-target="#orderModal">
                                        @lang('website.order_now')
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Home Section 3 -->
        @if(!empty($categories[2]))
            <div class="home-section p-t-70 p-b-70 " data-aos-once="true" data-aos="fade-up" data-aos-duration="1000"
                 data-aos-delay="400" style="background-color: {{$categories[2]->color}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1" data-aos-once="true" data-aos="fade-right" data-aos-duration="1000">
                            <div class="image">
                                <img src="{{$categories[2]->image}}" alt="Image Placeholder">
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-left" data-aos-once="true" data-aos-duration="1000">
                            <div class="content">
                                <h1>{{$categories[2]->name}}</h1>
                                <p>{{$categories[2]->desc}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-t-5 m-b-5">
                        <div class="col-12 text-center m-b-15">
                            <h3>@lang('website.products')</h3>
                        </div>
                        @foreach($categories[2]->products()->limit(4)->get() as $product)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="product-card  bg-dark" data-category="category1">
                                    <img src="{{$product->image}}" alt="{{$product->name}}" width="150" height="150">
                                    <h3>{{$product->name}}</h3>
                                    <p>{{$product->getPrice()}}</p>
                                    <button class="btn btn-primary m-t-10" data-toggle="modal" data-target="#orderModal">
                                        @lang('website.order_now')
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row justify-content-center m-t-50 m-b-50">
                <div class="col-8">
                    <div class="map-container">
                        <iframe class="map-iframe"
                                src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl={{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}&amp;q=10,20&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
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
