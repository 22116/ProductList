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

Auth::routes();

Route::get('/', 'Resources\ProductController@index');
Route::get('/home', 'Main\HomeController@index')->name('home');

Route::group(['name' => 'resources'], function () {
	Route::resource('product', 'Resources\ProductController');
	Route::resource('producer', 'Resources\ProducerController');
	Route::resource('type', 'Resources\TypeController');
});
