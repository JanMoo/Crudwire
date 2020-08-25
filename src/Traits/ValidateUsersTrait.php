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
        $validatedData      =[];
        $validationRules    = config('crudwire.validation_rules_create_new_user');

        $validatedData = $this->validate($request, $validationRules);

        return $validatedData;
    }

    public function validateUpdateUsers(Request $request)
    {
        $validatedData      =[];
        $validationRules    =config('crudwire.validation_rules_update_user');


        if ($request->password)
        {
            $validatedData = $this->validate($request, $validationRules);
        }
        else
        {
            unset($validationRules['password']);

            $validatedData = $this->validate($request, $validationRules);
        }

        return $validatedData;
    }
}
