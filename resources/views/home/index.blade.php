@extends('layout.panel')

@section('title')
@lang('all.home')
@endsection

@section('page_title')
@lang('all.home')
@endsection


@section('breadcrumb_title')
@lang('all.home')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-th-list"
                        ></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">@lang("all.categories_count")</span>
                    <span class="info-box-number">
                        {{ $categories_count }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-list"
                    ></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">@lang("all.sub_categories_count")</span>
                    <span class="info-box-number">{{ $sub_categories_count }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-box-open"
                    ></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">@lang("all.products_count")</span>
                    <span class="info-box-number">{{ $products_count }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-paper-plane"
                    ></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">@lang("all.orders_count")</span>
                    <span class="info-box-number">{{ $orders_count }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

    </div>

</div>
@endsection



