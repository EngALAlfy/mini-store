@extends('layout.blank')

@section('title')
    @lang('all.order_id') #{{$order->id}}
@endsection

@section('content')

    <style>
        body {
            background-color: #f8f9fa;
            margin-bottom: 50px;
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease-in-out;
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            border-bottom: none;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-group label {
            font-weight: bold;
            font-size: 14px;
        }

        .form-control[readonly] {
            background-color: #f8f9fa;
            border-color: transparent;
            box-shadow: none;
            font-weight: bold;
            font-size: 14px;
        }

        .rounded-image {
            border-radius: 10px;
            overflow: hidden;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .img-fluid:hover {
            transform: scale(1.1);
        }

        .zoom-preview {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
            z-index: 9999;
        }

        .zoom-preview.active {
            opacity: 1;
            pointer-events: auto;
        }

        .zoomed-image {
            max-width: 80%;
            max-height: 80%;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <img class="my-4" src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="150">
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @lang('all.order_details')
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="product_id" class="col-md-4 col-form-label text-md-right">@lang('all.product_id'):</label>
                            <div class="col-md-6">
                                <input id="product_id" type="text" class="form-control" value="{{ $order->product_id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_name" class="col-md-4 col-form-label text-md-right">@lang('all.client_name'):</label>
                            <div class="col-md-6">
                                <input id="client_name" type="text" class="form-control" value="{{ $order->client_name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_phone" class="col-md-4 col-form-label text-md-right">@lang('all.client_phone'):</label>
                            <div class="col-md-6">
                                <input id="client_phone" type="text" class="form-control" value="{{ $order->client_phone }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client_email" class="col-md-4 col-form-label text-md-right">@lang('all.client_email'):</label>
                            <div class="col-md-6">
                                <input id="client_email" type="text" class="form-control" value="{{ $order->client_email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">@lang('all.message'):</label>
                            <div class="col-md-6">
                                <textarea id="message" class="form-control" readonly>{{ $order->message }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">@lang('all.product_name'):</label>
                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" value="{{ $order->product->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_category" class="col-md-4 col-form-label text-md-right">@lang('all.category'):</label>
                            <div class="col-md-6">
                                <input id="product_category" type="text" class="form-control" value="{{ $order->product->category->name }} - {{ $order->product->subCategory->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="order_id" class="col-md-4 col-form-label text-md-right">@lang('all.order_id'):</label>
                            <div class="col-md-6">
                                <input id="order_id" type="text" class="form-control" value="#{{ $order->id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_image" class="col-md-4 col-form-label text-md-right">@lang('all.photo'):</label>
                            <div class="col-md-6">
                                <div class="rounded-image">
                                    <img id="product_image" src="{{ $order->product->image }}" class="img-fluid image-previewed" alt="Product Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
