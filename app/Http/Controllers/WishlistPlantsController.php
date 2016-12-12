<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use P4\Http\Controllers\Controller;
use P4\Plant;
use P4\Wishlistplant;
use P4\Garden;
use Session;


class WishlistplantsController extends Controller
{
    /**
     * Responds to requests to GET /
     * purpose: Show individual wishlist plant
     * Route::get('/wishlist/show/{id}', 'WishlistController@show')->name('wishlist.show');;
     */
    public function show($garden_id, $id)
    {
        $garden = Garden::find($garden_id);
        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('wishlistplants.show')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden]);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to add wishlist plant
     * Route::get('/wishlist/create', 'WishlistController@create')->name('wishlist.create');
     */
    public function create($garden_id)
    {
        $garden = Garden::find($garden_id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('wishlistplants.create')->with(['garden'=>$garden]);
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add wishlist plant
     * Route::post('/wishlist/create', 'WishlistController@store')->name('wishlist.store');
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
        $title = $request->input('title'); # Option 2) USE THIS ONE! :)
        $wishlistplant = new Wishlistplant();
        $wishlistplant->common_name = $request->input('common_name');
        $wishlistplant->scientific_name = $request->input('scientific_name');
        $wishlistplant->description = $request->input('description');
        $wishlistplant->prior_success = $request->input('prior_success');
        $wishlistplant->min_zone = $request->input('min_zone');
        $wishlistplant->max_zone = $request->input('max_zone');
        $wishlistplant->height = $request->input('height');
        $wishlistplant->bloomtime = $request->input('bloomtime');
        $wishlistplant->last_grown = $request->input('last_grown');
    //    $wishlistplant->garden_id = $request->garden()->id;
        $garden = Garden::find($garden_id);
        $garden->wishlistplants()->save($wishlistplant);
        $wishlistplant->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $wishlistplant->tags()->sync($gardens);
    //    $wishlistplant->save();
       Session::flash('flash_message', 'Your wishlist plant '.$wishlistplant->common_name.' was added.');

       return redirect('/gardens/show/'.$garden_id);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to edit wishlist plant
     * Route::get('/wishlist/edit/{id}', 'WishlistController@edit')->name('wishlist.edit');
     */
    public function edit($garden_id, $id)
    {
        $garden = Garden::find($garden_id);

        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('wishlistplants.edit')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden]);
        // return view('wishlistplants.edit');
    }
    /**
     * Responds to requests to GET /
     * purpose: Process form to edit wishlist plant
     * Route::put('/wishlist/edit/{id}', 'WishlistController@update')->name('wishlist.update');
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
        $wishlistplant = Wishlistplant::find($request->id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        $wishlistplant->common_name = $request->input('common_name');
        $wishlistplant->scientific_name = $request->input('scientific_name');
        $wishlistplant->description = $request->input('description');
        $wishlistplant->prior_success = $request->input('prior_success');
        $wishlistplant->min_zone = $request->input('min_zone');
        $wishlistplant->max_zone = $request->input('max_zone');
        $wishlistplant->height = $request->input('height');
        $wishlistplant->bloomtime = $request->input('bloomtime');
        $wishlistplant->last_grown = $request->input('last_grown');
    //    $plant->garden_id = $request->garden()->id;
        $wishlistplant->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $plant->tags()->sync($gardens);
    //    $plant->save();
        Session::flash('flash_message', 'Your wishlist plant '.$wishlistplant->common_name.' has been updated.');

        return redirect('/gardens/show/'.$garden_id);
    }

    /**
	* GET
    * Page to confirm deletion
	*/
    public function delete($garden_id, $id) {
        $garden = Garden::find($garden_id);

        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('wishlistplants.delete')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden]);
    }

    /**
    * POST
    */
    public function destroy($garden_id, $id)
    {
        # Get the wishlistplant to be deleted
        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        # First remove any tags associated with this wishlistplant
        if($wishlistplant->gardens()) {
            $wishlistplant->gardens()->detach();
        }
        # Then delete the plant
        $wishlistplant->delete();
        # Finish
        Session::flash('flash_message', $wishlistplant->common_name.' was deleted.');
        return redirect('/gardens/show/'.$garden_id);
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to move plant to wishlist
     * Route::get('/gardens/move/{id}}', 'GardenController@edit')->name('plants.move');
     */
    public function move($garden_id, $id)
    {
        $garden = Garden::find($garden_id);

        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('wishlistplants.move')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden]);
    }

    /**
    * POST
    */
    public function transfer(Request $request, $garden_id, $id)
    {
        $garden = Garden::find($garden_id);
        # Get the plant to be transfered
        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlist plant not found.');
            return redirect('/gardens/show/'.$garden_id);
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
       $plant = new Plant();
       $plant->common_name = $request->input('common_name');
       $plant->scientific_name = $request->input('scientific_name');
       $plant->description = $request->input('description');
       $plant->success = $request->input('prior_success');
       $plant->min_zone = $request->input('min_zone');
       $plant->max_zone = $request->input('max_zone');
       $plant->height = $request->input('height');
       $plant->bloomtime = $request->input('bloomtime');
       $plant->planted = $request->input('planted');
       $plant->location = $request->input('location');
       //    $plant->garden_id = $request->garden()->id;
       $garden->plants()->save($plant);
       $plant->save();

        // delete plant from plants list
        # First remove any tags associated with this plant
        // if($plant->gardens()) {
        //     $plant->gardens()->detach();
        // }
        # Then delete the plant
        // $plant->delete();
        # Finish
        // Session::flash('flash_message', $plant->common_name.' was moved to wishlist.');
        return view('wishlistplants.remove')->with(['wishlistplant' => $wishlistplant])->with(['garden' => $garden]);
    }

    /**
    * POST
    */
    public function remove($garden_id, $id)
    {
        # Get the plant to be deleted
        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlist plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        # First remove any tags associated with this plant
        if($wishlistplant->gardens()) {
            $wishlistplant->gardens()->detach();
        }
        # Then delete the plant
        $wishlistplant->delete();
        # Finish
        Session::flash('flash_message', $wishlistplant->common_name.' was removed from wishlist and added to plants.');
        return redirect('/gardens/show/'.$garden_id);
    }
} # end of class
