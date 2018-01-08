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

    public function search($key)
    {
        return Dist::where('name', 'like', '%' . $key . '%')
            ->get();
    }

    public function findOrFail($id)
    {
        return Dist::findOrFail($id);
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
        $dist = Dist::findOrFail($id);
        $dist->name = $input['name'];
        $dist->city_id = $input['city'];
        $dist->save();
    }

    public function delete($id)
    {
        return Dist::destroy($id);
    }
}
