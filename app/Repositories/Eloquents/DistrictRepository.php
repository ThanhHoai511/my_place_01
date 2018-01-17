<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Models\Dist;

class DistrictRepository implements DistrictRepositoryInterface
{
    public function all()
    {
        return Dist::all();
    }

    public function showDist()
    {
        return Dist::pluck('name', 'id');
    }

    public function searchInCity($city_id)
    {
        return Dist::where('city_id', $city_id)
            ->get();
    }

    public function search($key)
    {
        return Dist::where('name', 'like', '%' . $key . '%')
            ->get();
    }

    public function findOrFail($id)
    {
        return Dist::find($id);
    }

    public function paginate()
    {
         return Dist::paginate(config('paginate.paginateDist'));
    }

    public function create(array $input)
    {
        $dist = new Dist;
        $dist->name = $input['name'];
        $dist->city_id = $input['city'];
        $dist->save();
    }

    public function update(array $input, $id)
    {
        $dist = Dist::find($id);
        $dist->name = $input['name'];
        $dist->city_id = $input['city'];
        $dist->save();
    }

    public function delete($id)
    {
        return Dist::destroy($id);
    }
}
