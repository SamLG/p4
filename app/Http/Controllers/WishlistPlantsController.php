<?php

namespace P4\Http\Controllers;

use P4\Http\Controllers\Controller;
use P4\Wishlistplant;

class WishlistplantsController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Show individual wishlist plant
     * Route::get('/wishlist/show/{id}', 'WishlistController@show')->name('wishlist.show');;
     */
    public function show($id)
    {
        $wishlistplant = Wishlistplant::find($id);
        return view('wishlistplants.show')->with(['wishlistplant'=>$wishlistplant]);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to add wishlist plant
     * Route::get('/wishlist/create', 'WishlistController@create')->name('wishlist.create');
     */
    public function create()
    {
        return view('wishlistplants.create');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add wishlist plant
     * Route::post('/wishlist/create', 'WishlistController@store')->name('wishlist.store');
     */
    public function store()
    {
        return view('wishlistplants.store');
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to edit wishlist plant
     * Route::get('/wishlist/edit/{id}', 'WishlistController@edit')->name('wishlist.edit');
     */
    public function edit()
    {
        return view('wishlistplants.edit');
    }
    /**
     * Responds to requests to GET /
     * purpose: Process form to edit wishlist plant
     * Route::put('/wishlist/edit/{id}', 'WishlistController@update')->name('wishlist.update');
     */
    public function update()
    {
        return view('wishlistplants.update');
    }
} # end of class
