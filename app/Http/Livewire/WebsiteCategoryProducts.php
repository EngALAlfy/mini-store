<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Product;
use Livewire\Component;

class WebsiteCategoryProducts extends Component
{
    use Funcs;

    public $limit = 4;

    public $category_id = 0;
    public $productDetails;

    protected function getListeners(): array
    {
        return ["show_category_product_details_$this->category_id" => '$refresh', 'order_stored'];
    }

    public function order_stored()
    {
        $this->success();
    }

    public function setProduct(Product $product)
    {
        $this->productDetails = $product;
        $this->emit("show_category_product_details_$this->category_id");
    }

    function createOrder($product_id)
    {
        $this->emit('order_create', $product_id);
    }

    public function render()
    {
        $products = Product::latest();

        if ($this->category_id > 0) {
            $products = $products->where('category_id', $this->category_id);
        }

        $products = $products->limit($this->limit)->get();
        return view('livewire.website-category-products', compact('products'));
    }
}
