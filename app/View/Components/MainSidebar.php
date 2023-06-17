<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\View\Component;

class MainSidebar extends Component
{

    public $categories_count;
    public $sub_categories_count;
    public $orders_count;
    public $products_count;
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
        $this->sub_categories_count = SubCategory::count();
        $this->orders_count = Order::count();
        $this->products_count = Product::count();
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
