<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;

class WebsiteProducts extends Component
{
    use Funcs;

    public $title;

    public $random = false;
    public $limit = 8;

    public $categories = [];
    public $category_id = 0;
    public $sub_category_id = 0;
    public $productDetails;
    public $listeners = ['show_product_details' => '$refresh', 'order_stored'];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedCategoryId($id)
    {
        $this->sub_category_id = 0;
    }

    public function order_stored()
    {
        $this->success();
    }

    public function setProduct(Product $product)
    {
        $this->productDetails = $product;
        $this->emit('show_product_details');
    }

    function createOrder($product_id)
    {
        $this->emit('order_create', $product_id);
    }

    public function render()
    {
        $subCategories = [];
        $products = Product::latest();

        if ($this->random) {
            $products = $products->limit($this->limit);
        } else {
            if ($this->category_id > 0) {
                $subCategories = SubCategory::latest()->where('category_id', $this->category_id)->get();
            }

            if ($this->sub_category_id > 0) {
                $products = $products->where('sub_category_id', $this->sub_category_id);
            } else {
                if ($this->category_id > 0) {
                    $products = $products->where('category_id', $this->category_id);
                }
            }
        }

        $products = $products->get();
        return view('livewire.website-products', compact('products', 'subCategories'));
    }
}
