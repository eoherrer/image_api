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

Route::get('/', function () {
    return view('welcome');
});

Route::get('images', 'ImageController@index');
Route::get('images/{docName}', 'ImageController@show');
Route::post('images', 'ImageController@store');
Route::put('images/{id}', 'ImageController@update');
Route::delete('images/{id}', 'ImageController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
