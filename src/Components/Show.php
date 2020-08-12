<?php
namespace Janmoo\Crudwire\Components;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class show extends Component
{
    public $user, $edit, $name, $email, $email_verified_at, $hidden;

    public function mount(User $user)
    {
        $this->user               = $user;

        $this->name               = $user->name;
        $this->email              = $user->email;
        $this->email_verified_at  = $user->email_verified_at;
    }

    public function edit()
    {
        $this->edit= true;
    }

    public function cancel()
    {
        $this->edit= false;
        $this->mount($this->user);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name'              => 'min:2',
            'email'             => 'email',
            'email_verified_at' => 'date-format:Y-m-d G:i:s',

        ]);
    }

    public function submit(){

        $this->validate([
            'name'                => 'required|min:6',
            'email'               => 'required|email',
            'email_verified_at'   => 'nullable|date-format:Y-m-d G:i:s',
        ]);



        if($this->email_verified_at){
            $record = DB::table('users')
                    ->where('id', $this->user->id)
                    ->update([
                        'name'                  => $this->name,
                        'email'                 => $this->email,
                        'email_verified_at'     => $this->email_verified_at
                    ]);
        }else{
            $record = DB::table('users')
                    ->where('id', $this->user->id)
                    ->update([
                        'name'      => $this->name,
                        'email'     => $this->email
                    ]);
        }

        $this->user->name                        = $this->name;
        $this->user->email                       = $this->email;
        $this->user->email_verified_at           = $this->email_verified_at;

        $this->cancel();
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
