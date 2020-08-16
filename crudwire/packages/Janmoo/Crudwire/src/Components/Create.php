<?php
namespace Janmoo\Crudwire\Components;

use Livewire\Component;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function updated($field)
    {

        $this->validateOnly($field, [
            'name'                   => 'min:2',
            'email'                  => 'email',
            'password'               => 'min:8|confirmed',
            'password_confirmation'  => 'min:8',
        ]);
    }

    public function create()
    {

        //make data array
        $data = [
            "name"                  => $this->name,
            "email"                 => $this->email,
            "password"              => $this->password,
            "password_confirmation" => $this->password_confirmation,
        ];

        Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password'],)
        ]);

        dd($user);
    }


    public function render()
    {
        return view('crudwire::create');
    }
}
