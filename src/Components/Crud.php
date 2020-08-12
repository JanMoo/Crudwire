<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Crud extends Component
{
    use WithPagination;

    public $results_per_page, $search, $sortby, $ascdesc;
    public function mount()
    {
        $this->sortby = "id";
        $this->ascdesc= "asc";

    }
    public function dump()
    {
        return redirect()->route('register');

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('crudwire::crud',[
            'users' => User::Where('name', 'like', '%'.$this->search.'%' )
                        ->orWhere('email', 'like', '%'.$this->search.'%' )
                        ->orderBy($this->sortby, $this->ascdesc)
                        ->paginate($this->results_per_page),
        ]);
    }
}
