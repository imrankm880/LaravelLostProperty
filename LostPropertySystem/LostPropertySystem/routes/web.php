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
Route::get('/Items/report/{id}', 'ItemController@report')->name('Items/report/{id}')->middleware('auth');
Route::post('/Items/report', 'ItemController@reportAdd')->name('Items/report')->middleware('auth');


///Admin Routed
Route::get('dashboard/items-list', 'AdminItemsController@index')->middleware('auth','admin')->name('dashboard.items');
Route::get('dashboard/items-store', 'AdminItemsController@store')->middleware('auth','admin');
Route::get('dashboard/report-list', 'AdminItemsController@reportList')->middleware('auth','admin');
Route::get('dashboard/items-Pendinglist', 'AdminItemsController@PendingreportList')->middleware('auth','admin');
Route::get('dashboard/item-approve/{id}', 'AdminItemsController@pendingItemApprove')->middleware('auth','admin');
Route::get('dashboard/list-disaprove/{id}', 'AdminItemsController@pendingItemDisApprove')->middleware('auth','admin');
Route::get('dashboard/reject-item/{id}', 'AdminItemsController@rejectItem')->middleware('auth','admin');



Route::get('dashboard/report-list/edit/{id}', 'AdminItemsController@reportListEdit')->middleware('auth','admin');
Route::get('dashboard/list/image/delete/{id}', 'AdminItemsController@deleteImage')->middleware('auth','admin')->name('dashboard.item.image.delete');
Route::post('dashboard/report-list/update', 'AdminItemsController@reportListUpdate')->middleware('auth','admin');
Route::get('dashboard/logout', 'HomeController@logout')->middleware('auth','admin')->name('dashboard.logout');
Route::get('dashboard/approve', 'SendEmailController@index')->middleware('auth','admin');
Route::get('dashboard/dis-approve', 'SendEmailController@index')->middleware('auth','admin');
Route::post('dashboard/email', 'SendEmailController@send')->middleware('auth','admin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
