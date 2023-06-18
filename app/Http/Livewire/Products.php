<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use Funcs;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 50;
    public $orderBy = 'created_at';
    public $order = 'asc';
    public $search = '';

    public $deleteId;

    // settings
    public $delete_dialog;


    protected $listeners = ['product_stored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];



    public function product_stored()
    {
        $this->success();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.products', ['products' => Product::where('id', 'LIKE', '%' . $this->search . '%')->orWhere('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->orderBy, $this->order)->paginate($this->perPage)]);
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    function delete()
    {
        $product = Product::find($this->deleteId);

        //  delete
        $product->delete();

        $this->success();
        $this->deleteId = null;
    }
}
