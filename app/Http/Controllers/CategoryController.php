<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    use Funcs;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->expectsJson()){
            $categories = Category::latest()->get();
            return new SuccessResource($categories);
        }
        return view('categories.index');
    }


    public function websiteShow(Category $category){
        $perPage = Setting::find('perPage')->value ?? 10;

        $posts = Post::where("category_id" , $category->id)->paginate($perPage);
        return view('website.categories.show' , compact('category' , 'posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category , $type = null)
    {
        if(request()->expectsJson()){
            if($type == "posts"){
                $posts = Post::where("category_id" , $category->id)->latest()->get();
                return new SuccessResource($posts);
            }

            if($type == "subcategories"){
                $subcategories = SubCategory::where("category_id" , $category->id)->latest()->get();
                return new SuccessResource($subcategories);
            }

            return new ErrorResource([]);
        }

        return view('categories.show' , compact('category'));
    }
}
