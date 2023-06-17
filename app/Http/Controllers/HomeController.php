<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Price;
use App\Models\Product;
use App\Models\State;
use App\Models\SubCategory;
use Request;

class HomeController extends Controller
{

    function index()
    {
        $categories_count = Category::count();
        $sub_categories_count = SubCategory::count();
        $orders_count = Order::count();
        $products_count = Product::count();

        return view('home.index', compact('categories_count', 'products_count', 'orders_count', 'sub_categories_count'));
    }

    function websiteHome()
    {
        return view('website.home.index');
    }

    function search(Request $request)
    {
        $query = $request->input('q');
        return view('home.search' ,compact( 'query'));
    }

    function randomHexColor()
    {
        return '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    }


}
