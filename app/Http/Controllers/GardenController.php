<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use P4\Http\Controllers\Controller;
use P4\Plant;
use P4\Wishlistplant;
use P4\Garden;
use Session;

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
        $wishlistplants = Wishlistplant::all();
        return view('garden.index')->with('plants',$plants)->with('wishlistplants',$wishlistplants);
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
    public function store(Request $request)
    {
        # Validate
       $this->validate($request, [
           'common_name' => 'required',
        //    'published' => 'required|min:4|numeric',
        //    'cover' => 'required|url',
        //    'purchase_link' => 'required|url',
       ]);
       # If there were errors, Laravel will redirect the
       # user back to the page that submitted this request
       # The validator will tack on the form data to the request
       # so that it's possible (but not required) to pre-fill the
       # form fields with the data the user had entered
       # If there were NO errors, the script will continue...
       # Get the data from the form
       #$title = $_POST['title']; # Option 1) Old way, don't do this.
       $title = $request->input('title'); # Option 2) USE THIS ONE! :)
       $plant = new Plant();
       $plant->common_name = $request->input('common_name');
       $plant->scientific_name = $request->input('scientific_name');
       $plant->description = $request->input('description');
       $plant->success = $request->input('success');
       $plant->min_zone = $request->input('min_zone');
       $plant->max_zone = $request->input('max_zone');
       $plant->height = $request->input('height');
       $plant->bloomtime = $request->input('bloomtime');
       $plant->planted = $request->input('planted');
       $plant->location = $request->input('location');
    //    $plant->garden_id = $request->garden()->id;
       $plant->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $plant->tags()->sync($gardens);
    //    $plant->save();
       Session::flash('flash_message', 'Your plant '.$plant->title.' was added.');

       return redirect('/gardens');
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to edit plant
     * Route::get('/gardens/edit/{id}}', 'GardenController@edit')->name('plants.edit');
     */
    public function edit($id)
    {
        $plant = Plant::find($id);
        return view('plants.edit')->with(['plant'=>$plant]);
        // return view('plants.edit');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to edit plant
     * Route::put('/gardens/{id}', 'GardenController@update')->name('plants.update');
     */
    public function update(Request $request, $id)
    {
        # Validate
       $this->validate($request, [
           'common_name' => 'required',
        //    'published' => 'required|min:4|numeric',
        //    'cover' => 'required|url',
        //    'purchase_link' => 'required|url',
       ]);
       # If there were errors, Laravel will redirect the
       # user back to the page that submitted this request
       # The validator will tack on the form data to the request
       # so that it's possible (but not required) to pre-fill the
       # form fields with the data the user had entered
       # If there were NO errors, the script will continue...
       # Get the data from the form
       #$title = $_POST['title']; # Option 1) Old way, don't do this.
    //    $title = $request->input('title'); # Option 2) USE THIS ONE! :)
       $plant = Plant::find($request->id);
       $plant->common_name = $request->input('common_name');
       $plant->scientific_name = $request->input('scientific_name');
       $plant->description = $request->input('description');
       $plant->success = $request->input('success');
       $plant->min_zone = $request->input('min_zone');
       $plant->max_zone = $request->input('max_zone');
       $plant->height = $request->input('height');
       $plant->bloomtime = $request->input('bloomtime');
       $plant->planted = $request->input('planted');
       $plant->location = $request->input('location');
    //    $plant->garden_id = $request->garden()->id;
       $plant->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $plant->tags()->sync($gardens);
    //    $plant->save();
       Session::flash('flash_message', 'Your plant '.$plant->title.' was changed.');

       return redirect('/gardens');
    }


    /**
	* GET
    * Page to confirm deletion
	*/
    public function delete($id) {
        $plant = Plant::find($id);
        return view('plants.delete')->with('plant', $plant);
    }

    /**
    * POST
    */
    public function destroy($id)
    {
        # Get the plant to be deleted
        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('message','plant not found.');
            return redirect('/gardens');
        }
        # First remove any tags associated with this plant
        // if($plant->gardens()) {
        //     $plant->gardens()->detach();
        // }
        # Then delete the plant
        $plant->delete();
        # Finish
        Session::flash('flash_message', $plant->common_name.' was deleted.');
        return redirect('/gardens');
    }
} # end of class
