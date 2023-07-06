@extends('layout.website')


@section('title', __('all.contact_us'))

@push('styles')
    <style>

    </style>
@endpush

@section('content')

    <!-- SECTION -->
    <div class="section m-t-170 m-b-50" >
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-12">
                    @include('includes.status')

                    <div class="card">
                        <form action="{{ route('website.contact.store') }}" method="post">
                            @csrf
                            <div class="card-body row">
                                <div class="col-md-5 text-center d-flex align-items-center justify-content-center">
                                    <div class="">
                                        <img src="{{asset('assets/img/logo.png')}}" alt="{{__('website.name')}}"
                                             class="m-b-20" width="300" height="100">
                                        <h2><strong>{{ucfirst(__('website.name'))}}</strong></h2>
                                        <ul class="list-unstyled lead mb-5 mt-4 text-left text-muted">
                                            @isset($phone)
                                                <li class="mb-2">
                                                    <i class="fa fa-phone mr-3"></i>
                                                    <a class=" text-muted" href="tel:{{ $phone }}">{{ $phone }}</a></li>
                                            @endisset
                                            @isset($email)
                                                <li class="mb-2"><i class="fa fa-envelope mr-3"></i>
                                                    <a class=" text-muted"
                                                       href="mailto:{{ $email }}">{{ $email }}</a>
                                                </li>
                                            @endisset
                                            @isset($address)
                                                <li class="mb-2"><i class="fa fa-map-marker  mr-4"></i>{{ $address }}
                                                </li>
                                            @endisset
                                        </ul>
                                        <div class="social-links">
                                            <a href="" class="whatsapp mx-2"><i class="fa fa-2x fa-whatsapp"></i></a>
                                            <a href="" class="facebook mx-2"><i class="fa  fa-2x fa-facebook"></i></a>
                                            <a href="" class="linkedin  mx-2"><i class="fa  fa-2x fa-linkedin"></i></a>
                                            <a href="" class="twitter mx-2"><i class="fa  fa-2x fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="inputName">@lang("all.name")</label>
                                        <input type="text" required id="inputName"
                                               placeholder="@lang('website.name_placeholder')" name="name"
                                               class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">@lang("all.email")</label>
                                        <input type="email" required id="inputEmail"
                                               placeholder="@lang('website.email_placeholder')" name="email"
                                               class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">@lang("all.title")</label>
                                        <input type="text" required id="inputTitle"
                                               placeholder="@lang('website.title_placeholder')" name="title"
                                               class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPhone">@lang("all.phone")</label>
                                        <input type="text" required id="inputPhone"
                                               placeholder="@lang('website.phone_placeholder')" name="phone"
                                               class="form-control  @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage">@lang("all.message")</label>
                                        <textarea id="inputMessage" required
                                                  placeholder="@lang('website.message_placeholder')" name="message"
                                                  class="form-control  @error('message') is-invalid @enderror" rows="4"></textarea>
                                        @error('message')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="@lang('all.send')">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection

@push('styles')
@endpush
