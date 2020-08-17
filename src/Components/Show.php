<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class show extends Component
{
    public $hidden, $userid, $user;

    public function mount(User $user)
    {
        $this->user               = $user;
        $this->userid             = $user->id;
    }

    public function edit()
    {
      return redirect()->route('crudwireshow', ['id' => $this->userid]);
    }

    public function cancel()
    {
        $this->edit= false;
        $this->mount($this->user);
    }


    public function destroy(){
        User::destroy($this->user->id);

        $this->hidden = true;
    }

    public function render()
    {
        return view('crudwire::show');
    }
}
