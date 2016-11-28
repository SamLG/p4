<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//
// Route::get('/', function () {
//     return view('welcome');
// });

/*purpose: Homepage*/
Route::get('/', 'HomeController@index')->name('index');

/*purpose: Listing of plants & wishlist plants*/
Route::get('/gardens', 'GardenController@index')->name('garden.index');

/*purpose: Show individual plant*/
Route::get('/gardens/show/{id}', 'GardenController@show')->name('plants.show');

/*purpose: Show form to add plant*/
Route::post('/gardens/create', 'GardenController@create')->name('plants.create');

/*purpose: Process form to add plant*/
Route::post('/gardens/create', 'GardenController@store')->name('plants.store');

/*purpose: Show form to edit plant*/
Route::post('/gardens/edit/{id}}', 'GardenController@edit')->name('plants.edit');

/*purpose: Process form to edit plant*/
Route::post('/gardens/edit/{id}', 'GardenController@update')->name('plants.update');

/*purpose: Show individual wishlist plant*/
Route::post('/wishlist/show/{id}', 'WishlistController@show')->name('wishlist.show');

/*purpose: Show form to add wishlist plant*/
Route::post('/wishlist/create', 'WishlistController@create')->name('wishlist.create');

/*purpose: Process form to add wishlist plant*/
Route::post('/wishlist/create', 'WishlistController@store')->name('wishlist.store');

/*purpose: Show form to edit wishlist plant*/
Route::post('/wishlist/edit/{id}', 'WishlistController@edit')->name('wishlist.edit');

/*purpose: Process form to edit wishlist plant*/
Route::post('/wishlist/edit/{id}', 'WishlistController@update')->name('wishlist.update');
