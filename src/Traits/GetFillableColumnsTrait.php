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
    $columns                = Schema::getColumnListing($user->getTable());
    $columnsNotToDisplay    = config('crudwire.crudwire_dont_display');

        foreach ($columns as $key => $value) {
            if (in_array($value, $columnsNotToDisplay)) {
                unset($columns[$key]);
            }
        }
    return $columns;
   }
}
