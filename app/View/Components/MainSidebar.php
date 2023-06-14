<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Post;
use App\Models\Price;
use App\Models\State;
use Illuminate\View\Component;

class MainSidebar extends Component
{

    public $categories_count;
    public $prices_count;
    public $states_count;
    public $posts_count;
    public $pages_count;
    public $contacts_count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories_count = Category::count();
        $this->prices_count = Price::count();
        $this->states_count = State::count();
        $this->posts_count = Post::count();
        $this->pages_count = Page::count();
        $this->contacts_count = Contact::count();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-sidebar');
    }
}
