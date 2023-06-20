<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategories extends Component
{
    use Funcs;
    use WithPagination;

    public $perPage = 50;
    public $orderBy = 'created_at';
    public $order = 'desc';
    public $search = '';
    public $deleteId;
    public $delete_dialog;

    // settings
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['sub_category_stored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];


    public function sub_category_stored()
    {
        $this->success();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.sub-categories', ['subCategories' => SubCategory::where('id', 'LIKE', '%' . $this->search . '%')->orWhere('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->orderBy, $this->order)->paginate($this->perPage)]);
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    function delete()
    {
        $subCategory = SubCategory::find($this->deleteId);

        //  delete
        $subCategory->delete();

        $this->success();
        $this->deleteId = null;
    }
}
