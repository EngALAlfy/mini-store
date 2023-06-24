@extends('layout.website')


@section('title', $post->name )

@section('content')

    <div class="container" style="margin-top: 100px;">
        <h1>Products</h1>

        <div class="mb-3">
            <span class="category-filter active" data-category="all">All</span>
            <span class="category-filter" data-category="category1">Category 1</span>
            <span class="category-filter" data-category="category2">Category 2</span>
            <span class="category-filter" data-category="category3">Category 3</span>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="product-card" data-category="category1">
                    <img src="vegetable1.jpg" alt="Vegetable 1" class="img-fluid">
                    <h3>Product 1</h3>
                    <p>$19.99</p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#orderModal">Order Now</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category2">
                    <img src="fruit1.jpg" alt="Fruit 1" class="img-fluid">
                    <h3>Product 2</h3>
                    <p>$24.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category1">
                    <img src="vegetable2.jpg" alt="Vegetable 2" class="img-fluid">
                    <h3>Product 3</h3>
                    <p>$29.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category3">
                    <img src="fruit2.jpg" alt="Fruit 2" class="img-fluid">
                    <h3>Product 4</h3>
                    <p>$34.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category1">
                    <img src="vegetable1.jpg" alt="Vegetable 1" class="img-fluid">
                    <h3>Product 1</h3>
                    <p>$19.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category2">
                    <img src="fruit1.jpg" alt="Fruit 1" class="img-fluid">
                    <h3>Product 2</h3>
                    <p>$24.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category1">
                    <img src="vegetable2.jpg" alt="Vegetable 2" class="img-fluid">
                    <h3>Product 3</h3>
                    <p>$29.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-card" data-category="category3">
                    <img src="fruit2.jpg" alt="Fruit 2" class="img-fluid">
                    <h3>Product 4</h3>
                    <p>$34.99</p>
                    <button class="btn btn-primary">Order Now</button>
                </div>
            </div>
        </div>
    </div>

@endsection
