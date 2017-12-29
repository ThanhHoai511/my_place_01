<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function paginate()
    {
        return Category::paginate(config('paginate.paginateCate'));
    }

    public function showParent()
    {
        return Category::pluck('name', 'id');
    }
    
    public function showConcept()
    {
        return $cate = Category::groupBy('type_concept')->pluck('type_concept','type_concept');
    }

    public function create(array $input)
    {
        $category = new Category;
        $category->name = $input['name'];
        $category->parent_id = $input['parent_id'];
        $category->type_concept = $input['type_concept'];
        $category->save();
    }
}
