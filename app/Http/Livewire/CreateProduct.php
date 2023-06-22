<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use Funcs;
    use WithFileUploads;


    public $name;
    public $category_id;
    public $sub_category_id;
    public $image;
    public $color;
    public $price;
    public $desc;

    public $subCategories = [];

    protected $listeners = ['product_stored' => '$refresh'];

    protected $rules = [
        "name" => "required|unique:products,name|min:2|max:150|string",
        "sub_category_id" => "required|exists:sub_categories,id",
        "image" => "required|image|max:300",
        "price" => "nullable",
        "color" => "nullable|max:10",
        "desc" => "required|min:2|max:600",
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {
        $data = $this->validate();

        if (isset($data['image'])){
            $data['image'] = upload_image($data['image']);
        }

        if (isset($data['sub_category_id'])){
            $data['category_id'] = SubCategory::find($this->sub_category_id)->category_id;
        }

        if(!$data['price']){
            $data["price"] = 0;
        }

        Product::create($data);

        $this->success();

        $this->emit('product_stored');
        $this->name = null;
        $this->category_id = null;
        $this->sub_category_id = null;
        $this->price = null;
        $this->color = null;
        $this->desc = null;
        $this->image = null;
    }


    public function render()
    {
        $categories = Category::whereHas('subCategories')->get();
        return view('livewire.create-product', compact('categories'));
    }
}
