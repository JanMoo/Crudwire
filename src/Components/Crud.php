<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Schema;

class Crud extends Component
{
    use WithPagination;

    public $results_per_page, $search, $sortby, $ascdesc, $columns, $columnNames;

    /**
     * mount
     *
     * @param  mixed $user
     * @return void
     */
    public function mount(User $user)
    {
        $this->sortby           = "id";
        $this->ascdesc          = "asc";


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
     * render
     *
     * @return void
     */
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
