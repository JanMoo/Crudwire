<?php

namespace Janmoo\Crudwire\Traits;

use Illuminate\Support\Facades\Schema;

/**
 *
 */
trait GetFillableColumnsTrait
{
   public function getFillableColumns($user)
   {
    $columns = Schema::getColumnListing($user->getTable());

        foreach ($columns as $key => $value) {
            if (($value === "password") ||($value === "remember_token")) {

                unset($columns[$key]);
            }
        }
    return $columns;
   }
}
