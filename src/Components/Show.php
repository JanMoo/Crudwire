<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Livewire\Component;


class show extends Component
{
    public $hidden, $userid, $user, $confirmation, $columns;

    /**
     * mount
     *
     * @param  mixed $user
     * @param  mixed $columns
     * @return void
     */
    public function mount(User $user, $columns)
    {
        $this->user               = $user;
        $this->columns            = $columns;
    }

    /**
     * cancel
     *
     * @return void
     */
    public function cancel()
    {
        $this->confirmation = null;
    }

    /**
     * kill
     *
     * @return void
     */
    public function kill()
    {
        $this->confirmation = $this->user->id;
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy()
    {
        User::destroy($this->user->id);

        $this->hidden = true;
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('crudwire::show');
    }
}
