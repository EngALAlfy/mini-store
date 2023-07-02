@extends('layout.website')

@section('title', __('website.home'))

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- Home Sections -->
        @for($i=0;$i<3;$i++)
            @if(!empty($categories[$i]))
                <div class="home-section p-t-170 p-b-70 " data-aos-once="true" data-aos="fade-up"
                     data-aos-duration="1000"
                     data-aos-delay="400" style="background-color: {{$categories[$i]->color}}">
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
                                    <img src="{{$categories[$i]->imageUrl}}" alt="Image Placeholder">
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
                        <hr>
                        <div class="row m-t-5 m-b-5">
                            <div class="col-12 text-center m-b-15">
                                <h3>@lang('website.products')</h3>
                            </div>
                            @foreach($categories[$i]->products()->inRandomOrder()->limit(4)->get() as $product)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="product-card bg-dark">
                                        <img src="{{$product->image}}" alt="{{$product->name}}" width="150"
                                             height="150">
                                        <div class="p-l-20 p-r-20 p-b-20 p-t-10">
                                            <h3>{{$product->name}}</h3>
                                            <p>{{$product->getPrice()}}</p>
                                            <button class="btn btn-primary m-t-10" data-toggle="modal" data-target="">
                                                @lang('website.order_now')
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endfor
        <div class="container-fluid">
            <div class="row justify-content-center m-t-50 m-b-50">

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                <div class="">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="{{__('website.name')}}"
                                         class="m-b-20" width="120" height="120">
                                    <h2><strong>{{ucfirst(__('website.name'))}}</strong></h2>
                                    <p class="lead mb-5 mt-4 text-muted">
                                        @lang('website.desc')
                                    </p>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="map-container">
                                    <iframe class="map-iframe"
                                            src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl={{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}&amp;q=10,20&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                    </iframe>
                                </div>
                            </div>
                        </div>
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
