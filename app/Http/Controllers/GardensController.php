<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use P4\Http\Controllers\Controller;
use P4\Plant;
use P4\Wishlistplant;
use P4\Garden;
use Session;

class GardensController extends Controller
{
    function zones(){
        $usda_zones;
        for ($i=1; $i <= 13; $i++) {
            $usda_zones[] = $i.'a';
            $usda_zones[] = $i.'b';
        }
        return $usda_zones;
    }

    /**
     * Responds to requests to GET /
     * purpose: Listing of gardens & wishlist gardens
     * Route::get('/gardens', 'GardensController@index')->name('garden.index');
     */
    // public function index()
    // {
    //     $gardens = Garden::all();
    //     $wishlistgardens = Wishlistgarden::all();
    //     return view('garden.index')->with('gardens',$gardens)->with('wishlistgardens',$wishlistgardens);
    //     // return view('garden.index');
    // }

    /**
     * Responds to requests to GET /
     * purpose: Show individual garden
     * Route::get('/gardens/show/{id}', 'GardensController@show')->name('gardens.show');
     */
    public function show($id)
    {
        $garden = Garden::find($id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('gardens.show')->with(['garden'=>$garden]);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to add garden
     * Route::post('/gardens/create', 'GardensController@create')->name('gardens.create');
     */
    public function create()
    {
        return view('gardens.create')->with(['usda_zones'=>$this->zones()]);
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add garden
     * Route::post('/gardens/create', 'GardensController@store')->name('gardens.store');
     */
    public function store(Request $request)
    {
        # Validate
       $this->validate($request, [
           'name' => 'required',
        //    'published' => 'required|min:4|numeric',
           'image' => 'url',
           'locations' => 'numeric',
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
       $garden = new Garden();
       $garden->name = $request->input('name');
       $garden->location = $request->input('location');
       $garden->description = $request->input('description');
       $garden->created = $request->input('created');
    //    $book->author_id = $request->author_id;
       $garden->zone = $request->input('zone');
       $garden->image = $request->input('image');
       $garden->planImage = $request->input('planImage');
       $garden->locations = $request->input('locations');
       $garden->user_id = $request->user()->id; # <--- NEW LINE
       $garden->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $garden->tags()->sync($gardens);
    //    $garden->save();
       Session::flash('flash_message', 'Your garden '.$garden->name.' was added.');

       return redirect('/home');
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to edit garden
     * Route::get('/gardens/edit/{id}}', 'GardensController@edit')->name('gardens.edit');
     */
    public function edit($id)
    {
        $garden = Garden::find($id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('gardens.edit')->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
        // return view('gardens.edit');
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to edit garden
     * Route::put('/gardens/{id}', 'GardensController@update')->name('gardens.update');
     */
    public function update(Request $request, $id)
    {
        # Validate
       $this->validate($request, [
           'name' => 'required',
        //    'published' => 'required|min:4|numeric',
            'image' => 'url',
            'locations' => 'numeric',
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
       $garden = Garden::find($request->id);
       if(is_null($garden)) {
           Session::flash('flash_message','garden not found.');
           return redirect('/gardens');
       }
       $garden->name = $request->input('name');
       $garden->location = $request->input('location');
       $garden->description = $request->input('description');
       $garden->created = $request->input('created');
       $garden->zone = $request->input('zone');
       $garden->image = $request->input('image');
       $garden->planImage = $request->input('planImage');
       $garden->locations = $request->input('locations');
    //    $garden->garden_id = $request->garden()->id;
       $garden->save();
    //    # Save Garden
    //    $gardens = ($request->gardens) ?: [];
    //    $garden->tags()->sync($gardens);
    //    $garden->save();
       Session::flash('flash_message', 'Your garden '.$garden->name.' has been updated.');

       return redirect('/home');
    }


    /**
	* GET
    * Page to confirm deletion
	*/
    public function delete($id) {
        $garden = Garden::find($id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('gardens.delete')->with('garden', $garden);
    }

    /**
    * POST
    */
    public function destroy($id)
    {
        # Get the garden to be deleted
        $garden = Garden::find($id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        # First remove any tags associated with this garden
        if($garden->plants()) {
            $garden->plants()->detach();
        }
        if($garden->wishlistplants()) {
            $garden->wishlistplants()->detach();
        }
        # Then delete the garden
        $garden->delete();
        # Finish
        Session::flash('flash_message', $garden->name.' was deleted.');
        return redirect('/home');
    }
} # end of class
