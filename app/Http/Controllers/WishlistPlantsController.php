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
    function zones(){
        $usda_zones;
        for ($i=1; $i <= 13; $i++) {
            $usda_zones[] = $i.'a';
            $usda_zones[] = $i.'b';
        }
        return $usda_zones;
    }
    function messages(){
        $messages = [
            'zone_check' => 'minimum zone must be smaller than maximum zone',
        ];
        return $messages;
    }
    /**
     * Responds to requests to GET /
     * purpose: Show individual wishlist plant
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
     */
    public function create($garden_id)
    {
        $garden = Garden::find($garden_id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('wishlistplants.create')->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add wishlist plant
     */
    public function store($garden_id, Request $request)
    {
        # Validate
        $this->validate($request, [
            'common_name' => 'required',
            'min_zone' => 'zone_check:min_zone,max_zone',
            'image' => 'url',
        ], $this->messages());

        $title = $request->input('title'); # Option 2) USE THIS ONE! :)
        $wishlistplant = new Wishlistplant();
        $wishlistplant->common_name = $request->input('common_name');
        $wishlistplant->scientific_name = $request->input('scientific_name');
        $wishlistplant->description = $request->input('description');
        $wishlistplant->image = $request->input('image');
        $wishlistplant->prior_success = $request->input('prior_success');
        $wishlistplant->min_zone = $request->input('min_zone');
        $wishlistplant->max_zone = $request->input('max_zone');
        $wishlistplant->height = $request->input('height');
        $wishlistplant->bloomtime = $request->input('bloomtime');
        $wishlistplant->last_grown = $request->input('last_grown');
        $garden = Garden::find($garden_id);
        $garden->wishlistplants()->save($wishlistplant);
        $wishlistplant->save();

       Session::flash('flash_message', 'Your wishlist plant '.$wishlistplant->common_name.' was added.');

       return redirect('/gardens/show/'.$garden_id);
    }
    /**
     * Responds to requests to GET /
     * purpose: Show form to edit wishlist plant
     */
    public function edit($garden_id, $id)
    {
        $garden = Garden::find($garden_id);

        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('wishlistplants.edit')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
        // return view('wishlistplants.edit');
    }
    /**
     * Responds to requests to PUT /
     * purpose: Process form to edit wishlist plant
     */
    public function update(Request $request, $garden_id, $id)
    {
        # Validate
       $this->validate($request, [
           'common_name' => 'required',
           'min_zone' => 'zone_check:min_zone,max_zone',
           'image' => 'url',
    ], $this->messages());

        $wishlistplant = Wishlistplant::find($request->id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        $wishlistplant->common_name = $request->input('common_name');
        $wishlistplant->scientific_name = $request->input('scientific_name');
        $wishlistplant->description = $request->input('description');
        $wishlistplant->image = $request->input('image');
        $wishlistplant->prior_success = $request->input('prior_success');
        $wishlistplant->min_zone = $request->input('min_zone');
        $wishlistplant->max_zone = $request->input('max_zone');
        $wishlistplant->height = $request->input('height');
        $wishlistplant->bloomtime = $request->input('bloomtime');
        $wishlistplant->last_grown = $request->input('last_grown');
        $wishlistplant->save();

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
    * DELETE
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
     */
    public function move($garden_id, $id)
    {
        $garden = Garden::find($garden_id);

        $wishlistplant = Wishlistplant::find($id);
        if(is_null($wishlistplant)) {
            Session::flash('flash_message','wishlistplant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('wishlistplants.move')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
    }

    /**
    * PUT
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
           'min_zone' => 'zone_check:min_zone,max_zone',
           'location' => 'numeric',
           'image' => 'url',
       ], $this->messages());

       $plant = new Plant();
       $plant->common_name = $request->input('common_name');
       $plant->scientific_name = $request->input('scientific_name');
       $plant->description = $request->input('description');
       $plant->image = $request->input('image');
       $plant->success = $request->input('prior_success');
       $plant->min_zone = $request->input('min_zone');
       $plant->max_zone = $request->input('max_zone');
       $plant->height = $request->input('height');
       $plant->bloomtime = $request->input('bloomtime');
       $plant->planted = $request->input('planted');
       $plant->location = $request->input('location');
       $garden->plants()->save($plant);
       $plant->save();

        return view('wishlistplants.remove')->with(['wishlistplant'=>$wishlistplant])->with(['garden'=>$garden]);
    }

    /**
    * DELETE
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
