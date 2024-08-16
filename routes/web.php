<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceptesController;

//  Route::get('/', function () {
//      return view('welcome');
//  });

// returns the home page with all posts
Route::get('/', ReceptesController::class .'@index')->name('receptes.index');
// returns the form for adding a post
Route::get('/receptes/create', ReceptesController::class .'@create')->name('receptes.create');
// adds a post to the database
Route::post('/receptes', ReceptesController::class .'@store')->name('receptes.store');
// returns a page that shows a full post
Route::get('/receptes/{recepta}', ReceptesController::class .'@show')->name('receptes.show');
// returns the form for editing a post
Route::get('/receptes/{recepta}/edit', ReceptesController::class .'@edit')->name('receptes.edit');
// updates a post
Route::put('/receptes/{recepta}', ReceptesController::class .'@update')->name('receptes.update');
// deletes a post
Route::delete('/receptes/{recepta}', ReceptesController::class .'@destroy')->name('receptes.destroy');
