<?php
namespace Janmoo\Crudwire;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth\VerificationController;


class CrudwireUserController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'password'  => Hash::make($validatedData['password'],)
        ]);

        $user->sendEmailVerificationNotification();

        session()->flash('crudwire', 'new user created succesfully');
        return view('crudwire::crudwire');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('crudwire::create', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = array();

        if( $user->password === $request->password)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            $user->fill($validatedData);
        }
        else
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);


                $user->name         = $validatedData['name'];
                $user->email        = $validatedData['email'];
                $user->password     = Hash::make($validatedData['password']);
                $user->save;
        }



    }

}
