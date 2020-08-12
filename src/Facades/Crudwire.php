<?php

namespace Janmoo\Crudwire\Facades;

use Illuminate\Support\Facades\Facade;

class Crudwire extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'crudwire';
    }
}
