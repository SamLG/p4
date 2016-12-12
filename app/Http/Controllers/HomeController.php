<?php

namespace P4\Http\Controllers;

use P4\Http\Controllers\Controller;
use DB;
use P4\Garden;

class HomeController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Homepage
     * Route::get('/', 'HomeController@index')->name('index');
     */
    public function index()
    {
        # Use the QueryBuilder to get all the books
        // $plants = DB::table('plants')->get();
        //
        // # Output the results
        // foreach ($plants as $plant) {
        //     for ($i=0; $i < 100; $i++) {
        //         echo $plant->common_name;
        //     }
        // }
        // return view('home.index');

        // $plant = new Plant();
        //
        // $plant->common_name = 'marigold';
        // $plant->scientific_name = '';
        // $plant->description = 'a great plant for borders, keeps some pests out of garden';
        // $plant->success = 'excellent';
        // $plant->hardiness = 'annual';
        // $plant->height = '10 inches';
        // $plant->bloomtime = 'all season';
        // $plant->planted = 'every spring';
        // $plant->location = '';
        //
        // $plant->save();
        //
        // echo '<br><br><br><br><br><br>Added: '.$plant;

        // $plants = Plant::all();
        // return view('home.index')->with('plants',$plants);
        $gardens = Garden::all();
        return view('home.index')->with('gardens',$gardens);

    }

} # end of class
