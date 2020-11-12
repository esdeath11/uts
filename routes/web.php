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

Route::get('/', 'ContentController@index')->name('index');
Route::get('/create', 'ContentController@create')->name('create');
Route::post('/create','ContentController@store')->name('post');
Route::get('/destroy/{f}', 'ContentController@destroy')->name('destroy');
Route::get('/edit/{d}', 'ContentController@edit')->name('ganti');
Route::post('/edit/{d}', 'ContentController@update')->name('update');

