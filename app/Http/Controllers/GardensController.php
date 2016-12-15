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
     * purpose: Show individual garden
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
     */
    public function create()
    {
        return view('gardens.create')->with(['usda_zones'=>$this->zones()]);
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add garden
     */
    public function store(Request $request)
    {
        # Validate
       $this->validate($request, [
           'name' => 'required',
           'image' => 'url',
           'locations' => 'numeric',
       ]);

       $garden = new Garden();
       $garden->name = $request->input('name');
       $garden->location = $request->input('location');
       $garden->description = $request->input('description');
       $garden->created = $request->input('created');
       $garden->zone = $request->input('zone');
       $garden->image = $request->input('image');
       $garden->planImage = $request->input('planImage');
       $garden->locations = $request->input('locations');
       $garden->user_id = $request->user()->id; # <--- NEW LINE
       $garden->save();

       Session::flash('flash_message', 'Your garden '.$garden->name.' was added.');

       return redirect('/home');
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to edit garden
     */
    public function edit($id)
    {
        $garden = Garden::find($id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('gardens.edit')->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
    }

    /**
     * Responds to requests to PutT /
     * purpose: Process form to edit garden
     */
    public function update(Request $request, $id)
    {
        # Validate
        $this->validate($request, [
            'name' => 'required',
            'image' => 'url',
            'locations' => 'numeric',
        ]);

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
        $garden->save();

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
    * Delete
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
