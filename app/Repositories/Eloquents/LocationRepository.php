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
        if ($input['open']) {
            $location->open_hour = $input['open'];
        }
        $location->name = $input['name'];
        $location->add = $input['add'];
        if ($input['close']) {
            $location->close_hour = $input['close'];
        }
        if ($input['dist_id']) {
            $location->dist_id = $input['dist_id'];
        }
        if ($input['range']) {
            $location->range = $input['range'];
        }
        if ($input['image']) {
            $location->image = $input['image'];
        }
        $location->save();
    }

    public function count() {
        return Location::count();
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
