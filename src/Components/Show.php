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
