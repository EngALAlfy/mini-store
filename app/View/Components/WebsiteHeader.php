<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\View\Component;

class WebsiteHeader extends Component
{
    public $pages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->pages = Page::oldest('id')->limit(3)->get();
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
