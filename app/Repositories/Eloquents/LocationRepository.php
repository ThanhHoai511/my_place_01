<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Models\Location;

class LocationRepository implements LocationRepositoryInterface
{
    public function create($input, $id)
    {
        $location = new Location;
        $location->place_id = $id;
        $location->open_hour = $input['open'];
        $location->name = $input['name'];
        $location->add = $input['add'];
        $location->close_hour = $input['close'];
        $location->dist_id = $input['dist_id'];
        $location->range = $input['range'];
        $location->image = $input['image'];
        $location->save();
    }

    public function all()
    {
        return Location::all();
    }

    public function findOrFail($id)
    {
        return Location::findOrFail($id);
    }

    public function delete($placeId)
    {
        return Location::destroy($placeId);
    }
}
