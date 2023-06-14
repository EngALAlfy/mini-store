@extends('layout.website')


@section('title', __('all.contact_us'))

@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-8">
                    @include('includes.status')
                    <div class="section-row">
                        <div class="section-title">
                            <h2 class="title">معلومات التواصل</h2>
                        </div>
                        <p>يمكنك التوصل معنا بسهولة عبر وسائل الاتصال الأتية.</p>
                        <ul class="contact">
                            @isset($phone)
                                <li><i class="fa fa-phone"></i>{{ $phone }}</li>
                            @endisset
                            @isset($email)
                                <li><i class="fa fa-envelope"></i> <a href="mailto:{{ $email }}">{{ $email }}</a>
                                </li>
                            @endisset
                            @isset($address)
                                <li><i class="fa fa-map-marker"></i>{{ $address }}</li>
                            @endisset
                        </ul>
                    </div>

                    <div class="section-row">
                        <div class="section-title">
                            <h2 class="title">ارسل لنا بريدا</h2>
                        </div>
                        <form action="{{ route('website.contact.store') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="input" type="text" name="name" placeholder="@lang("all.name")">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" placeholder="@lang("all.email")">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="input" type="text" name="phone" placeholder="@lang("all.phone")">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="input" type="text" name="title" placeholder="@lang("all.title")">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="@lang("all.message")"></textarea>
                                    </div>
                                    <button class="primary-button">@lang("all.send")</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/summernote/summernote-lite.css') }}">
@endpush
