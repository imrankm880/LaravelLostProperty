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

// pizza routes
Route::get('/Items', 'ItemController@index')->name('items');
Route::get('/Items/create', 'ItemController@create')->name('item.create')->middleware('auth');
Route::post('/Items/store', 'ItemController@store')->name('item.store');
Route::get('/Items/show/{id}', 'ItemController@show')->name('item.show')->middleware('auth');
Route::get('/Items/report', 'ItemController@report')->name('item.report')->middleware('auth');

// Route::delete('/pizzas/{id}', 'pizzaController@destroy')->name('pizza.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
