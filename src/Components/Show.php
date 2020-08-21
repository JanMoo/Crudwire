<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;


class show extends Component
{
    public $hidden, $userid, $user, $confirmation, $columns;

    public function mount(User $user, $columns)
    {
        $this->user               = $user;
        $this->columns            = $columns;
    }

    public function cancel()
    {
        $this->confirmation = null;
    }

    public function kill()
    {
        $this->confirmation = $this->user->id;
    }

    public function destroy()
    {


        User::destroy($this->user->id);

        $this->hidden = true;
    }

    public function render()
    {
        return view('crudwire::show');
    }
}
