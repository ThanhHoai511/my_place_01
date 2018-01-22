<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryValRepositoryInterface;
use App\Models\CateVal;

class CategoryValRepository implements CategoryValRepositoryInterface
{
    public function all()
    {
        return CateVal::all();
    }

    public function find($id)
    {
        return CateVal::find($id);
    }

    public function getCate($cateId)
    {
        return CateVal::where('cate_id', $cateId)->get();
    }

    public function getCatePlace($placeId)
    {
        return CateVal::where('place_id', $placeId)->get();
    }

    public function paginate()
    {
        return CateVal::paginate(config('paginate.paginateCate'));
    }

    public function create(array $input)
    {
        $cateVal = new CateVal;
        $category->place_id = $input['place_id'];
        $category->cate_id = $input['cate_id'];
        $category->save();
    }

    public function update(array $input, $id)
    {
        $category = CateVal::find($id);
        $category->place_id = $input['place_id'];
        $category->cate_id = $input['cate_id'];
        $category->save();
    }

    public function delete($id)
    {
        return CateVal::destroy($id);
    }
}
