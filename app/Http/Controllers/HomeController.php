<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Price;
use App\Models\State;
use App\Models\SubCategory;
use Request;

class HomeController extends Controller
{

    function index()
    {
        $categories_count = Category::count();
        $prices_count = Price::count();
        $states_count = State::count();
        $posts_count = Post::count();

        return view('home.index', compact('categories_count' , 'posts_count' , 'prices_count' , 'states_count'));
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
