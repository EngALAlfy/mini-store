<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;

class CreateSubCategory extends Component
{
    use Funcs;


    public $name;
    public $category_id;

    protected $listeners = ['sub_category_stored' => '$refresh'];

    protected $rules = [
        "name" => "required|unique:sub_categories,name|min:2|max:150|string",
        "category_id" => "required|exists:categories,id",
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {

        $data = $this->validate();

        SubCategory::create($data);

        $this->success();

        $this->emit('sub_category_stored');
        $this->name = null;
        $this->category_id = null;
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-sub-category', compact('categories'));
    }
}
