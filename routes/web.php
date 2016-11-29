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
Route::get('/gardens/create', 'GardenController@create')->name('plants.create');

/*purpose: Process form to add plant*/
Route::post('/gardens/create', 'GardenController@store')->name('plants.store');

/*purpose: Show form to edit plant*/
Route::get('/gardens/edit/{id}}', 'GardenController@edit')->name('plants.edit');

/*purpose: Process form to edit plant*/
Route::put('/gardens/edit/{id}', 'GardenController@update')->name('plants.update');

/*purpose: Show individual wishlist plant*/
Route::get('/wishlist/show/{id}', 'WishlistController@show')->name('wishlist.show');

/*purpose: Show form to add wishlist plant*/
Route::get('/wishlist/create', 'WishlistController@create')->name('wishlist.create');

/*purpose: Process form to add wishlist plant*/
Route::post('/wishlist/create', 'WishlistController@store')->name('wishlist.store');

/*purpose: Show form to edit wishlist plant*/
Route::get('/wishlist/edit/{id}', 'WishlistController@edit')->name('wishlist.edit');

/*purpose: Process form to edit wishlist plant*/
Route::put('/wishlist/edit/{id}', 'WishlistController@update')->name('wishlist.update');

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
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');

        return 'Dropped foobooks; created foobooks.';
    });

};
