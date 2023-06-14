<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\StorePageRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.index');
    }

    public function show(Page $page)
    {
        //
        return view('pages.show', compact('page'));
    }

    public function websiteShow(Page $page)
    {
        //
        return view('pages.show', compact('page'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(StorePageRequest $request)
    {
        $data = $request->validated();

        Page::create($data);

        $this->success();

        return redirect()->route('admin.pages.index');
    }

}
