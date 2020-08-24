<?php

namespace Janmoo\Crudwire\Traits;

use Illuminate\Http\Request;

/**
 *
 */
trait ValidateUsersTrait
{
    public function validateCreateUsers(Request $request)
    {
        $validatedData=[];

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        return $validatedData;
    }

    public function validateUpdateUsers(Request $request)
    {
        $validatedData=[];

        if ($request->password)
        {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8|confirmed',
            ]);
        }
        else
        {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);
        }

        return $validatedData;
    }
}
