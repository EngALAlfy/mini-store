<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sub-categories.index');
    }



    public function show(SubCategory $subCategory)
    {
        //
    }


    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
