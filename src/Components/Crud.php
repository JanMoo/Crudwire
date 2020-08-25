<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;
use Livewire\WithPagination;
use Janmoo\Crudwire\Traits\GetFillableColumnsTrait;


class Crud extends Component
{
    use WithPagination, GetFillableColumnsTrait;

    public $search, $sortBy, $ascDesc, $columns, $columnNames, $pagination;

    /**
     * mount
     *
     * @param  mixed $user
     * @return void
     */
    public function mount(User $user)
    {
        $this->sortBy           = "id";
        $this->ascDesc          = "asc";
        $this->pagination       = config("crudwire.crudwire_pagination");
        $this->columns          = $this->getFillableColumns($user);
    }
    /**
     * updatingSearch
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * updatedSortBy
     *
     * @return void
     */
    public function updatedSortBy()
    {
        $this->resetPage();
    }

    /**
     * updatedgAscDesc
     *
     * @return void
     */
    public function updatedgAscDesc()
    {
        $this->resetPage();
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $users = User::when($this->search, function($query){
                    return $query->Where('name', 'like', '%'.$this->search.'%' )
                    ->orWhere('email', 'like', '%'.$this->search.'%' );
                })
                ->orderBy($this->sortBy, $this->ascDesc)
                ->paginate($this->pagination);

        return view('crudwire::crud',['users' => $users ]);
    }
}
