<?php

namespace P4\Http\Controllers;

use P4\Http\Controllers\Controller;
use P4\Plant;

class GardenController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Listing of plants & wishlist plants
     * Route::get('/gardens', 'GardenController@index')->name('garden.index');
     */
    public function index()
    {
        $plants = Plant::all();
        return view('garden.index')->with('plants',$plants);

        // return view('garden.index');
    }
    /**
     * Responds to requests to GET /
     * purpose: Show individual plant
     * Route::get('/gardens/show/{id}', 'GardenController@show')->name('plants.show');
     */
    public function show($id)
    {
        $plant = Plant::find($id);
        return view('plants.show')->with(['plant'=>$plant]);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to add plant
     * Route::post('/gardens/create', 'GardenController@create')->name('plants.create');
     */
    public function create()
    {
        return view('plants.create');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add plant
     * Route::post('/gardens/create', 'GardenController@store')->name('plants.store');
     */
    public function store()
    {
        return view('plants.store');
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to edit plant
     * Route::get('/gardens/edit/{id}}', 'GardenController@edit')->name('plants.edit');
     */
    public function edit()
    {
        return view('plants.edit');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to edit plant
     * Route::put('/gardens/edit/{id}', 'GardenController@update')->name('plants.update');
     */
    public function update()
    {
        return view('plants.update');
    }
} # end of class
