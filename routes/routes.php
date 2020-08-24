<?php

use Illuminate\Support\Facades\Route;
use Janmoo\Crudwire\CrudwireUserController;

$prefix       = config('crudwire.crudwire_prefix');
$middleware   = config('crudwire.crudwire_middleware');

Route::name('crudwire.')->prefix($prefix)->middleware($middleware)->group(function () {

    Route::resource('user', CrudwireUserController::class )->except(['destroy', 'show']);

});





