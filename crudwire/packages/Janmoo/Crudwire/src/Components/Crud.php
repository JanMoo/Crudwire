<?php
namespace Janmoo\Crudwire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Crud extends Component
{

    public function render()
    {

        $users =  DB::table('users')->get();
        return view('crudwire::crud',['users' => $users]);
    }
}
