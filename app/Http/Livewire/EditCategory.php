<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategory extends Component
{
    use Funcs;
    use WithFileUploads;

    public $category;

    public $name;
    public $image;
    public $desc;
    public $color;

    protected $listeners = ['category_updated' => '$refresh' , 'category_edit'];

    protected $rules = [
        "name" => "required|unique:categories,name|min:2|max:150|string",
        "color" => "nullable|max:10|min:2",
        "image" => "nullable|max:300|image",
        "desc" => "nullable|max:600|min:2",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function update(){

        $data = $this->validate();

        if (isset($data['image']) && !is_string($data['image']) && $data['image'] != $this->category->imageName){
            $data['image'] = upload_image($data['image']);
            $this->category->image = $data["image"];
        }

        $this->category->save();

        $this->success();

        $this->emit('category_updated');
        $this->resetData();
    }


    public function render()
    {
        return view('livewire.edit-category');
    }

    public function category_edit(Category $category)
    {
        $this->category = $category;
        $this->fillData();
    }

    public function fillData(){
        $this->name = $this->category->name;
        $this->image = $this->category->imageUrl;
        $this->color = "#fff";
        $this->desc = $this->category->desc;
    }

    public function resetData(){
        $this->name = null;
        $this->image = null;
        $this->color = null;
        $this->desc = null;
    }
}
