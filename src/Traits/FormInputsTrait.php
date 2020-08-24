<?php

namespace Janmoo\Crudwire\Traits;

/**
 *
 */
trait FormInputsTrait
{
   public function getInputList()
   {
       $inputList = [
           'password'   => 'crudwire::form.inputs.password',
           'name'       => 'crudwire::form.inputs.name',
           'email'      => 'crudwire::form.inputs.email',
           'default'    => 'crudwire::form.inputs.text'  ];

        return $inputList;
   }
}
