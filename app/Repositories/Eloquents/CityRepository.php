<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function all()
    {
        return City::all();
    }

    public function search($key)
    {
        return City::where('name', 'like', '%'.$key.'%')
            ->get();
    }

    public function find($id)
    {
        return City::find($id);
    }

    public function paginate()
    {
         return City::paginate(config('paginate.paginateCity'));
    }

    public function create(array $input)
    {
        $city = new City;
        $city->name = $input['name'];
        $city->save();
    }

    public function update(array $input, $id)
    {
        $city = City::find($id);
        $city->name = $input['name'];
        $city->save();
    }

    public function delete($id)
    {
        return City::destroy($id);
    }
}
