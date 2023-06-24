@extends('layout.website')

@section('title', __('website.home'))

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- Home Section 1 -->
        <div class="home-section p-t-170 p-b-70 animated-section" data-aos="fade-up" data-aos-duration="1000"
             data-aos-delay="400" style="background-color: {{$categories[0]->color}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1" data-aos="fade-right" data-aos-duration="1000">
                        <div class="image">
                            <img src="{{$categories[0]->image}}" alt="Image Placeholder">
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="content">
                            <h1>{{$categories[0]->name}}</h1>
                            <p>{{$categories[0]->desc}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>@lang('website.products')</h3>
                    </div>
                    @foreach($categories[0]->products as $product)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="product-card" data-category="category1">
                                <img src="vegetable1.jpg" alt="Vegetable 1" class="img-fluid">
                                <h3>Product 1</h3>
                                <p>$19.99</p>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#orderModal">Order Now</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Home Section 2 -->
        <div class="home-section p-t-70 p-b-70 animated-section" data-aos="fade-up" data-aos-duration="1000"
             data-aos-delay="400" style="background-color: {{$categories[1]->color}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="content">
                            <h1>{{$categories[1]->name}}</h1>
                            <p>{{$categories[1]->desc}}</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1" data-aos="fade-right" data-aos-duration="1000">
                        <div class="image">
                            <img src="{{$categories[1]->image}}" alt="Image Placeholder">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Home Section 3 -->
        <div class="home-section p-t-70 p-b-70 animated-section" data-aos="fade-up" data-aos-duration="1000"
             data-aos-delay="400" style="background-color: {{$categories[2]->color}}">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1" data-aos="fade-right" data-aos-duration="1000">
                        <div class="image">
                            <img src="{{$categories[2]->image}}" alt="Image Placeholder">
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="content">
                            <h1>{{$categories[2]->name}}</h1>
                            <p>{{$categories[2]->desc}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div style="width: 100%">
                        <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=address+(title)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            <a href="https://www.maps.ie/distance-area-calculator.html">area maps</a></iframe>
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
