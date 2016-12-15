<?php

namespace P4\Http\Controllers;

use P4\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use P4\Http\Requests;
use P4\Garden;

class HomeController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Homepage
     * Route::get('/', 'HomeController@index')->name('index');
     */
    public function index(Request $request)
    {
        $user = $request->user();

        # Note: We're getting the user from the request, but you can also get it like this:
        //$user = Auth::user();

        if($user) {
            # Approach 2) Take advantage of Model relationships
            $gardens = $user->gardens()->get();
        }
        else {
            $gardens = [];
        }

        return view('home.index')->with(['gardens' => $gardens]);

    }

} # end of class
