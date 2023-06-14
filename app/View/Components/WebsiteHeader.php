<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\View\Component;

class WebsiteHeader extends Component
{
    public $categories;
    public $header_ad;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::latest()->withCount('posts')->limit(6)->get();
        $this->header_ad = Setting::find("header_ad")->value ?? null;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website-header');
    }
}
