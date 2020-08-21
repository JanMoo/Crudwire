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




        Route::prefix($prefix)->middleware($middleware)->group(function () {
            Route::get('/', function () {
                return view('crudwire::crudwire');
            })->name('crudwire');

            Route::get('user', [CrudwireUserController::class, 'index'] )->name('newuser');

            Route::post('user', [CrudwireUserController::class, 'create'])->name('createuser');
            Route::get('user/{id}', [CrudwireUserController::class, 'show'])->name('edituser');
            Route::post('user/{id}', [CrudwireUserController::class, 'update'])->name('updateuser');

        });



/*Route::get('crudwire', function () {
    return view('crudwire::crudwire');
})->middleware('web')->name('crudwire');

Route::get('crudwire/user', function () {
    return view('crudwire::create');
})->middleware('web')->name('newuser');

Route::post('crudwire/user', [CrudwireUserController::class, 'create'])->middleware('web')->name('createuser');
Route::get('crudwire/user/{id}', [CrudwireUserController::class, 'show'])->middleware('web')->name('edituser');
Route::post('crudwire/user/{id}', [CrudwireUserController::class, 'update'])->middleware('web')->name('updateuser');


//build routes for updating and creating users
//route::get('crudwire', 'Janmoo\Crudwire\CrudwireController@index');

//route::get('crudwire/create', 'CrudwireController@create')->middleware('auth');

//route::get('crudwire', function () {
//    return view('crudwire::crudwire');
//});

//route::livewire('livewire', 'crudwire::crud'); */

