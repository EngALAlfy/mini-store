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

    public $phone;
    public $email;
    public $address;
    public $pages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->phone = optional(Setting::find("phone"))->value;
        $this->email = optional(Setting::find("email"))->value;
        $this->address = optional(Setting::find("address"))->value;

        $this->pages = Page::latest('id')->limit(3)->get();
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
