<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Pages extends Component
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


    protected $listeners = ['page_stored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];



    public function page_stored()
    {
        $this->success();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pages = Page::where('name', 'LIKE', '%' . $this->search . '%')->orderBy($this->orderBy, $this->order)->paginate($this->perPage);
        return view('livewire.pages', compact('pages'));
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    function delete()
    {
        $page = Page::find($this->deleteId);

        //  delete
        $page->delete();

        $this->success();
        $this->deleteId = null;
    }
}
