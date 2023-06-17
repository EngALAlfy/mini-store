<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use Funcs;
       use WithFileUploads;


    public $name;
    public $image;
    public $desc;
    public $color;

    protected $listeners = ['category_stored' => '$refresh'];

    protected $rules = [
        "name" => "required|unique:categories,name|min:2|max:150|string",
        "color" => "nullable|max:10|min:2",
        "image" => "nullable|max:300|image",
        "desc" => "nullable|max:600|min:2",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }


    public function store(){

        $data = $this->validate();

        if (isset($data['image'])){
            $data['image'] = upload_image($data['image']);
        }

        Category::create($data);

        $this->success();

        $this->emit('category_stored');
        $this->name = null;
        $this->image = null;
        $this->color = null;
        $this->desc = null;
    }


    public function render()
    {
        return view('livewire.create-category');
    }
}
