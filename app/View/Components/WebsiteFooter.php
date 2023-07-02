<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use App\Models\Price;
use App\Models\Setting;
use App\Models\State;
use Illuminate\View\Component;

class WebsiteFooter extends Component
{

    public $facebook;
    public $instagram;
    public $youtube;
    public $pages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->facebook = Setting::find("facebook")->value ?? "https://facebook.com";
        $this->instagram = Setting::find("instagram")->value ?? "https://instagram.com";
        $this->youtube = Setting::find("youtube")->value ?? "https://youtube.com";
        $this->pages = Page::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website-footer');
    }
}
