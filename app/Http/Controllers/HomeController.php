<?php

namespace P4\Http\Controllers;

use P4\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Homepage
     * Route::get('/', 'HomeController@index')->name('index');
     */
    public function index()
    {
        return view('home.index');
    }
} # end of class
