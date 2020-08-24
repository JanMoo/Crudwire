<?php

use Illuminate\Support\Facades\Route;
use Janmoo\Crudwire\CrudwireUserController;

$prefix = config('crudwire.crudwire_prefix');
$auth   = config('crudwire.crudwire_auth');
$middleware;

if($auth){
    $middleware = array('web', 'auth');
}else{
    $middleware = 'web';
}

Route::name('crudwire.')->prefix($prefix)->middleware($middleware)->group(function () {

    Route::resource('user', CrudwireUserController::class )->except(['destroy', 'show']);

});





