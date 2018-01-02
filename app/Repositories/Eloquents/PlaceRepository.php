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
        return Place::where('name', 'like', '%'.$key.'%')
            ->get();
    }

    public function find($id)
    {
        return Place::find($id);
    }

    public function paginate()
    {
        // return Place::paginate(config('paginate.paginateCate'));
    }

    public function create(array $input)
    {
    }

    public function update(array $input, $id)
    {
    }

    public function delete($id)
    {
        return Place::destroy($id);
    }
}
