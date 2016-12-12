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

Route::get('/gardens/show/{id}', 'GardensController@show')->name('gardens.show');

Route::get('/gardens/create', 'GardensController@create')->name('gardens.create');

Route::post('/gardens/create', 'GardensController@store')->name('gardens.store');

Route::get('/gardens/edit/{id}', 'GardensController@edit')->name('gardens.edit');

Route::put('/gardens/{id}', 'GardensController@update')->name('gardens.update');

/*purpose: Get route to confirm delete garden*/
Route::get('/gardens/delete/{id}', 'GardensController@delete')->name('gardens.destroy');

/*purpose: Get route to delete garden*/
Route::delete('/gardens/delete/{id}', 'GardensController@destroy')->name('gardens.destroy');


/*purpose: Show individual plant*/
Route::get('/gardens/{garden_id}/plants/show/{id}', 'GardenController@show')->name('plants.show');

/*purpose: Show form to add plant*/
Route::get('/gardens/{garden_id}/plants/create', 'GardenController@create')->name('plants.create');

/*purpose: Process form to add plant*/
Route::post('/gardens/{garden_id}/plants/create', 'GardenController@store')->name('plants.store');

/*purpose: Show form to edit plant*/
Route::get('/gardens/{garden_id}/plants/edit/{id}', 'GardenController@edit')->name('plants.edit');

/*purpose: Process form to edit plant*/
Route::put('/gardens/{garden_id}/plants/{id}', 'GardenController@update')->name('plants.update');

/*purpose: Get route to confirm delete plant*/
Route::get('/gardens/{garden_id}/plants/delete/{id}', 'GardenController@delete')->name('plants.destroy');

/*purpose: Get route to delete plant*/
Route::delete('/gardens/{garden_id}/plants/delete/{id}', 'GardenController@destroy')->name('plants.destroy');

/*purpose: Show form to move plant to wishlist*/
Route::get('/gardens/{garden_id}/plants/move/{id}', 'GardenController@move')->name('plants.move');

/*purpose: Process form to move plant to wishlist*/
Route::put('/gardens/{garden_id}/plants/move/{id}', 'GardenController@transfer')->name('plants.transfer');

/*purpose: Route to remove plant from plant list*/
Route::delete('/gardens/{garden_id}/plants/remove/{id}', 'GardenController@remove')->name('plants.remove');


/*purpose: Show individual wishlist plant*/
Route::get('/gardens/{garden_id}/wishlistplants/show/{id}', 'WishlistplantsController@show')->name('wishlistplants.show');

/*purpose: Show form to add wishlist plant*/
Route::get('/gardens/{garden_id}/wishlistplants/create', 'WishlistplantsController@create')->name('wishlistplants.create');

/*purpose: Process form to add wishlist plant*/
Route::post('/gardens/{garden_id}/wishlistplants/create', 'WishlistplantsController@store')->name('wishlistplants.store');

/*purpose: Show form to edit wishlist plant*/
Route::get('/gardens/{garden_id}/wishlistplants/edit/{id}', 'WishlistplantsController@edit')->name('wishlistplants.edit');

/*purpose: Process form to edit wishlist plant*/
Route::put('/gardens/{garden_id}/wishlistplants/{id}', 'WishlistplantsController@update')->name('wishlistplants.update');

/*purpose: Get route to confirm delete plant*/
Route::get('/gardens/{garden_id}/wishlistplants/delete/{id}', 'WishlistplantsController@delete')->name('wishlistplants.destroy');

/*purpose: Get route to delete plant*/
Route::delete('/gardens/{garden_id}/wishlistplants/delete/{id}', 'WishlistplantsController@destroy')->name('wishlistplants.destroy');

/*purpose: Show form to move wishlistplant to plants list*/
Route::get('/gardens/{garden_id}/wishlistplants/move/{id}', 'WishlistplantsController@move')->name('wishlistplants.move');

/*purpose: Process form to move wishlistplant to plants list*/
Route::put('/gardens/{garden_id}/wishlistplants/move/{id}', 'WishlistplantsController@transfer')->name('wishlistplants.transfer');

/*purpose: Route to remove wishlistplant from wishlist*/
Route::delete('/gardens/{garden_id}/wishlistplants/remove/{id}', 'WishlistplantsController@remove')->name('wishlistplants.remove');


Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
// if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database green_thumb');
        DB::statement('CREATE database green_thumb');

        return 'Dropped green_thumb; created green_thumb.';
    });

// };

Auth::routes();

Route::get('/home', 'HomeController@index');
