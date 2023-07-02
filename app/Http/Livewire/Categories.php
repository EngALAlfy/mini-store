<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use Funcs;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 50;
    public $orderBy = 'created_at';
    public $order = 'desc';
    public $search = '';

    public $deleteId;

    // settings
    public $delete_dialog;


    protected $listeners = ['category_stored' , 'category_updated'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];



    public function category_stored()
    {
        $this->success();
    }

    public function category_updated()
    {
        $this->success();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.categories', ['categories' => Category::where('id', 'LIKE', '%' . $this->search . '%')->orWhere('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->orderBy, $this->order)->paginate($this->perPage)]);
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    function edit($id)
    {
        $this->emit('category_edit' , $id);
    }

    function delete()
    {
        $category = Category::find($this->deleteId);

        //  delete
        $category->delete();

        $this->success();
        $this->deleteId = null;
    }
}
