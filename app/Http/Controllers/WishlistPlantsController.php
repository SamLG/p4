<?php

namespace P4\Http\Controllers;

use P4\Http\Controllers\Controller;
use P4\WishlistPlant

class WishlistPlantsController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Show individual wishlist plant
     * Route::get('/wishlist/show/{id}', 'WishlistController@show')->name('wishlist.show');;
     */
    public function show()
    {
        return view('wishlistPlants.index');
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to add wishlist plant
     * Route::get('/wishlist/create', 'WishlistController@create')->name('wishlist.create');
     */
    public function create()
    {
        return view('wishlistPlants.create');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add wishlist plant
     * Route::post('/wishlist/create', 'WishlistController@store')->name('wishlist.store');
     */
    public function store()
    {
        return view('wishlistPlants.store');
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to edit wishlist plant
     * Route::get('/wishlist/edit/{id}', 'WishlistController@edit')->name('wishlist.edit');
     */
    public function edit()
    {
        return view('wishlistPlants.edit');
    }
    /**
     * Responds to requests to GET /
     * purpose: Process form to edit wishlist plant
     * Route::put('/wishlist/edit/{id}', 'WishlistController@update')->name('wishlist.update');
     */
    public function update()
    {
        return view('wishlistPlants.update');
    }
} # end of class
