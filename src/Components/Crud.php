<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Schema;
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


        $columns = Schema::getColumnListing($user->getTable());

        foreach ($columns as $key => $value) {
            if (($value === "password") ||($value === "remember_token")) {

                unset($columns[$key]);
            }
        }

        $this->columns = $columns;
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
        $user;

        if ($this->search) {
            $user = User::Where('name', 'like', '%'.$this->search.'%' )
                    ->orWhere('email', 'like', '%'.$this->search.'%' )
                    ->orderBy($this->sortBy, $this->ascDesc)
                    ->paginate($this->pagination);
        } else {
            $user = User::orderBy($this->sortBy, $this->ascDesc)
                    ->paginate($this->pagination);
        }


        return view('crudwire::crud',[
            'users' => $user,
        ]);
    }
}
