<?php

use Illuminate\Support\Facades\Route;





Route::post('crudwire', 'Janmoo\Crudwire\CrudwireUserController@create')->middleware('web');
Route::get('crudwire/edit/{id}', 'Janmoo\Crudwire\CrudwireUserController@show');
Route::post('crudwire/{id}', 'Janmoo\Crudwire\CrudwireUserController@update')->middleware('web')->name('crudwireupdate');
Route::get('crudwire/create', function () {
    return view('crudwire::create');
})->middleware('web');

//build routes for updating and creating users
//route::get('crudwire', 'Janmoo\Crudwire\CrudwireController@index');

//route::get('crudwire/create', 'CrudwireController@create')->middleware('auth');

//route::get('crudwire', function () {
//    return view('crudwire::crudwire');
//});

//route::livewire('livewire', 'crudwire::crud');
