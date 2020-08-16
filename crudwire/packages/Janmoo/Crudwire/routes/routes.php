<?php

use Illuminate\Support\Facades\Route;




Route::get('crudwire/user', function () {
    return view('crudwire::create');
})->middleware('web')->name('newuser');
Route::post('crudwire/user', 'Janmoo\Crudwire\CrudwireUserController@create')->middleware('web')->name('createuser');
Route::get('crudwire/user/{id}', 'Janmoo\Crudwire\CrudwireUserController@show')->middleware('web')->name('edituser');
Route::post('crudwire/user/{id}', 'Janmoo\Crudwire\CrudwireUserController@update')->middleware('web')->name('updateuser');


//build routes for updating and creating users
//route::get('crudwire', 'Janmoo\Crudwire\CrudwireController@index');

//route::get('crudwire/create', 'CrudwireController@create')->middleware('auth');

//route::get('crudwire', function () {
//    return view('crudwire::crudwire');
//});

//route::livewire('livewire', 'crudwire::crud');
