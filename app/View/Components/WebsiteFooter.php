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
    public $categories;
    public $prices;
    public $pages;
    public $states;

    public $footer_ad;
    public $facebook_followers_count;
    public $instagram_followers_count;
    public $youtube_followers_count;

    public $facebook;
    public $instagram;
    public $youtube;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->categories = Category::orderBy('created_at')->withCount('posts')->limit(6)->get();
        $this->prices = Price::latest()->limit(10)->get();
        $this->pages = Page::latest()->limit(5)->get();
        $this->states = State::latest()->withCount('posts')->limit(5)->get();

        $this->footer_ad = Setting::find("footer_ad")->value ?? null;

        $this->facebook_followers_count = followers_count(Setting::find("facebook_followers_count")->value ?? 1000);
        $this->instagram_followers_count = followers_count(Setting::find("instagram_followers_count")->value ?? 1000);
        $this->youtube_followers_count = followers_count(Setting::find("youtube_followers_count")->value ?? 1000);

        $this->facebook = Setting::find("facebook")->value ?? "https://facebook.com";
        $this->instagram = Setting::find("instagram")->value ?? "https://instagram.com";
        $this->youtube = Setting::find("youtube")->value ?? "https://youtube.com";
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
