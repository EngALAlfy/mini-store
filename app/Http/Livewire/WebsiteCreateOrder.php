<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class WebsiteCreateOrder extends Component
{
    use Funcs;

    public $product;
    public $product_name;

    public $client_name;
    public $client_email;
    public $client_phone;
    public $message;

    protected $listeners = ['order_stored' => '$refresh' , 'order_create'];

    protected $rules = [
        "client_name" => "required|min:2|max:150|string",
        "client_email" => "required|max:100|min:6|email",
        "client_phone" => "required|max:15|min:5",
        "message" => "nullable|max:600|min:2",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $data = $this->validate();

        $data["product_id"] = $this->product->id;

        Order::create($data);

        $this->success();

        $this->emit('order_stored');
    }


    public function render()
    {
        return view('livewire.website-create-order');
    }

    public function order_create(Product $product)
    {
        $this->product = $product;
        $this->product_name = $product->name;
    }
}
