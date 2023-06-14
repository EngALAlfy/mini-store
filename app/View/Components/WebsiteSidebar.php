<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\Setting;
use Illuminate\View\Component;

class WebsiteSidebar extends Component
{
    public $side_ad;
    public $facebook_followers_count;
    public $instagram_followers_count;
    public $youtube_followers_count;

    public $facebook;
    public $instagram;
    public $youtube;

    public $side_posts;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->side_ad = Setting::find("side_ad")->value ?? null;

        $this->facebook_followers_count = followers_count(Setting::find("facebook_followers_count")->value ?? 1000);
        $this->instagram_followers_count = followers_count(Setting::find("instagram_followers_count")->value ?? 1000);
        $this->youtube_followers_count = followers_count(Setting::find("youtube_followers_count")->value ?? 1000);

        $this->facebook = Setting::find("facebook")->value ?? "https://facebook.com";
        $this->instagram = Setting::find("instagram")->value ?? "https://instagram.com";
        $this->youtube = Setting::find("youtube")->value ?? "https://youtube.com";

        $this->side_posts = Post::inRandomOrder()->limit(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website-sidebar');
    }
}
