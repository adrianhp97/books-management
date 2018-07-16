<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/{title}-{uuid}', 'BookController@show');

Route::get('/{uuid}/edit', 'BookController@edit');

Route::put('/{uuid}', 'BookController@update')->name('book.update');

Route::delete('/{uuid}', 'BookController@destroy')->name('book.delete');

Route::resource('/', 'BookController');