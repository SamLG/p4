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
     * purpose: Show individual plant
     * Route::get('/gardens/show/{id}', 'GardenController@show')->name('plants.show');
     */
    public function show($garden_id, $id)
    {
        $garden = Garden::find($garden_id);

        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('plants.show')->with(['plant'=>$plant])->with(['garden'=>$garden]);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to add plant
     * Route::post('/gardens/create', 'GardenController@create')->name('plants.create');
     */
    public function create($garden_id)
    {
        $garden = Garden::find($garden_id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('plants.create')->with(['garden'=>$garden]);
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add plant
     * Route::post('/gardens/create', 'GardenController@store')->name('plants.store');
     */
    public function store($garden_id, Request $request)
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
    //    $plant->garden_id = $request->garden()->id; #attach to garden
       # Connect this plant to this garden
       $garden = Garden::find($garden_id);
       $garden->plants()->save($plant);
       $plant->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $plant->tags()->sync($gardens);
    //    $plant->save();
       Session::flash('flash_message', 'Your plant '.$plant->common_name.' was added.');

       return redirect('/gardens/show/'.$garden_id);
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to edit plant
     * Route::get('/gardens/edit/{id}}', 'GardenController@edit')->name('plants.edit');
     */
    public function edit($garden_id, $id)
    {
        $garden = Garden::find($garden_id);
        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('plants.edit')->with(['plant'=>$plant])->with(['garden'=>$garden]);
        // return view('plants.edit');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to edit plant
     * Route::put('/gardens/{id}', 'GardenController@update')->name('plants.update');
     */
    public function update(Request $request, $garden_id, $id)
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
       if(is_null($plant)) {
           Session::flash('flash_message','plant not found.');
           return redirect('/gardens/show/'.$garden_id);
       }
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
       Session::flash('flash_message', 'Your plant '.$plant->common_name.' has been updated.');

       return redirect('/gardens/show/'.$garden_id);
    }


    /**
	* GET
    * Page to confirm deletion
	*/
    public function delete($garden_id, $id) {
        $garden = Garden::find($garden_id);

        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('plants.delete')->with(['plant'=>$plant])->with(['garden'=>$garden]);
    }

    /**
    * POST
    */
    public function destroy($garden_id, $id)
    {
        # Get the plant to be deleted
        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        # First remove any tags associated with this plant
        if($plant->gardens()) {
            $plant->gardens()->detach();
        }
        # Then delete the plant
        $plant->delete();
        # Finish
        Session::flash('flash_message', $plant->common_name.' was deleted.');
        return redirect('/gardens/show/'.$garden_id);
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to move plant to wishlist
     * Route::get('/gardens/move/{id}}', 'GardenController@edit')->name('plants.move');
     */
    public function move($garden_id, $id){
        $garden = Garden::find($garden_id);

        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('plants.move')->with(['plant'=>$plant])->with(['garden'=>$garden]);
    }

    /**
    * POST
    */
    public function transfer(Request $request, $garden_id, $id)
    {
        $garden = Garden::find($garden_id);
        # Get the plant to be transfered
        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id)->with(['garden'=>$garden]);
        }

        // add plant to wishlist
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
       $wishlistplant = new Wishlistplant();
       $wishlistplant->common_name = $request->input('common_name');
       $wishlistplant->scientific_name = $request->input('scientific_name');
       $wishlistplant->description = $request->input('description');
       $wishlistplant->prior_success = $request->input('success');
       $wishlistplant->min_zone = $request->input('min_zone');
       $wishlistplant->max_zone = $request->input('max_zone');
       $wishlistplant->height = $request->input('height');
       $wishlistplant->bloomtime = $request->input('bloomtime');
       $wishlistplant->last_grown = $request->input('planted');
       //attach wishlistplant to garden
       $garden->wishlistplants()->save($wishlistplant);
       $wishlistplant->save();

        // delete plant from plants list
        # First remove any tags associated with this plant
        // if($plant->gardens()) {
        //     $plant->gardens()->detach();
        // }
        # Then delete the plant
        // $plant->delete();
        # Finish
        // Session::flash('flash_message', $plant->common_name.' was moved to wishlist.');
        return view('plants.remove')->with(['plant'=>$plant])->with(['garden'=>$garden]);
    }

    /**
    * POST
    */
    public function remove($garden_id, $id)
    {
        # Get the plant to be deleted
        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        # First remove any tags associated with this plant
        if($plant->gardens()) {
            $plant->gardens()->detach();
        }
        # Then delete the plant
        $plant->delete();
        # Finish
        Session::flash('flash_message', $plant->common_name.' was removed from plant list and added to wishlists.');
        return redirect('/gardens/show/'.$garden_id)->with(['garden_id'=>$garden_id]);
    }
} # end of class
