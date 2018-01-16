<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\PlaceRepositoryInterface;
use App\Models\Place;

class PlaceRepository implements PlaceRepositoryInterface
{
    public function all()
    {
        return Place::all();
    }

    public function search($key)
    {
        return Place::where('name', 'like', '%' . $key . '%')
            ->get();
    }

    public function create(array $input)
    {
        $place = new Place;
        $place->name = $input['name'];
        $place->add = $input['add'];
        $place->dist_id = $input['dist_id'];
        $place->image = $input['image'];
        if (isset($input['open'])) {
            $place->open_hour = $input['open'];
        };
        if (isset($input['close'])) {
            $place->close_hour = $input['close'];
        };
        $place->range = $input['range'];
        $place->save();
    }

    public function findOrFail($id)
    {
        return Place::findOrFail($id);
    }

    public function paginate()
    {
        return Place::paginate(config('paginate.paginatePlace'));
    }

    public function update(array $input, $id)
    {
        $place = Place::findOrFail($id);
        $place->name = $input['name'];
        $place->add = $input['add'];
        $place->dist_id = $input['dist_id'];
        $place->image = $input['image'];
        if (isset($input['open'])) {
            $place->open_hour = $input['open'];
        };
        if (isset($input['close'])) {
            $place->close_hour = $input['close'];
        };
        $place->range = $input['range'];
        $place->save();
    }

    public function delete($id)
    {
        return Place::destroy($id);
    }

    public function addPlace($namePlace, $address, $image)
    {
        $place = new Place;
        $place->name = $namePlace;
        $place->add = $address;
        $place->image = $image;
        $place->save();
    }

    public function countReview($placeId)
    {
        return Place::findOrFail($placeId)->count();
    }

    public function updateRate($dataPlace)
    {
        try {
            $place = Place::findOrFail($dataPlace['place_id']);
            $place->avg_service_rate = $place->avg_service_rate + $dataPlace['service_rate'];
            $place->avg_quality_rate = $place->avg_quality_rate + $dataPlace['quality_rate'];
            $place->total_rate++;
            $place->save();
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }
}
