<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use P4\Http\Controllers\Controller;
use P4\Plant;
use P4\Wishlistplant;
use P4\Garden;
use Session;

class PlantsController extends Controller
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
     * purpose: Show individual plant
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
     */
    public function create($garden_id)
    {
        $garden = Garden::find($garden_id);
        if(is_null($garden)) {
            Session::flash('flash_message','garden not found.');
            return redirect('/home');
        }
        return view('plants.create')->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
    }
    /**
     * Responds to requests to POST /
     * purpose: Process form to add plant
     */
    public function store($garden_id, Request $request)
    {
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
       $plant->success = $request->input('success');
       $plant->min_zone = $request->input('min_zone');
       $plant->max_zone = $request->input('max_zone');
       $plant->height = $request->input('height');
       $plant->bloomtime = $request->input('bloomtime');
       $plant->planted = $request->input('planted');
       $plant->location = $request->input('location');
       # Connect this plant to this garden
       $garden = Garden::find($garden_id);
       $garden->plants()->save($plant);
       $plant->save();

       Session::flash('flash_message', 'Your plant '.$plant->common_name.' was added.');

       return redirect('/gardens/show/'.$garden_id);
    }

    /**
     * Responds to requests to GET /
     * purpose: Show form to edit plant
     */
    public function edit($garden_id, $id)
    {
        $garden = Garden::find($garden_id);
        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('plants.edit')->with(['plant'=>$plant])->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
    }
    /**
     * Responds to requests to PUT /
     * purpose: Process form to edit plant
     */
    public function update(Request $request, $garden_id, $id)
    {
        # Validate
       $this->validate($request, [
           'common_name' => 'required',
           'min_zone' => 'zone_check:min_zone,max_zone',
           'location' => 'numeric',
           'image' => 'url',
    ], $this->messages());

       $plant = Plant::find($request->id);
       if(is_null($plant)) {
           Session::flash('flash_message','plant not found.');
           return redirect('/gardens/show/'.$garden_id);
       }
       $plant->common_name = $request->input('common_name');
       $plant->scientific_name = $request->input('scientific_name');
       $plant->description = $request->input('description');
       $plant->image = $request->input('image');
       $plant->success = $request->input('success');
       $plant->min_zone = $request->input('min_zone');
       $plant->max_zone = $request->input('max_zone');
       $plant->height = $request->input('height');
       $plant->bloomtime = $request->input('bloomtime');
       $plant->planted = $request->input('planted');
       $plant->location = $request->input('location');
       $plant->save();

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
    * DELETE
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
     */
    public function move($garden_id, $id){
        $garden = Garden::find($garden_id);

        $plant = Plant::find($id);
        if(is_null($plant)) {
            Session::flash('flash_message','plant not found.');
            return redirect('/gardens/show/'.$garden_id);
        }
        return view('plants.move')->with(['plant'=>$plant])->with(['garden'=>$garden])->with(['usda_zones'=>$this->zones()]);
    }

    /**
    * PUT
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
           'min_zone' => 'zone_check:min_zone,max_zone',
           'location' => 'numeric',
           'image' => 'url',
    ], $this->messages());

       $wishlistplant = new Wishlistplant();
       $wishlistplant->common_name = $request->input('common_name');
       $wishlistplant->scientific_name = $request->input('scientific_name');
       $wishlistplant->description = $request->input('description');
       $wishlistplant->image = $request->input('image');
       $wishlistplant->prior_success = $request->input('success');
       $wishlistplant->min_zone = $request->input('min_zone');
       $wishlistplant->max_zone = $request->input('max_zone');
       $wishlistplant->height = $request->input('height');
       $wishlistplant->bloomtime = $request->input('bloomtime');
       $wishlistplant->last_grown = $request->input('planted');
       //attach wishlistplant to garden
       $garden->wishlistplants()->save($wishlistplant);
       $wishlistplant->save();

        return view('plants.remove')->with(['plant'=>$plant])->with(['garden'=>$garden]);
    }

    /**
    * DELETE
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
