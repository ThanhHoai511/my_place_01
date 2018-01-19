<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CollectionRepositoryInterface;
use App\Models\Collection;
use Auth;

class CollectionRepository implements CollectionRepositoryInterface
{
    public function all()
    {
        return Collection::all();
    }

    public function search($key)
    {
        return Collection::where('name', 'like', '%' . $key . '%')
            ->get();
    }

    public function findOrFail($id)
    {
        return Collection::findOrFail($id);
    }

    public function paginate()
    {
        return Collection::paginate(config('paginate.paginateCollection'));
    }

    public function userCollection($id)
    {
        return Collection::whereIn('user_id', [$id, 1])
            ->where('review_id', null)
            ->get();
    }

    public function saveToCollection(array $input)
    {
        $collection = new Collection;
        $collection->name = $input['name'];
        $collection->user_id = Auth::user()->id;
        $collection->collection_id = $input['collection_id'];
        $collection->review_id = $input['review_id'];
        $collection->save();
        
        return 1;
    }

    public function checkUniqueName($name)
    {
        $collection = Collection::where('user_id', Auth::user()->id)
                ->orWhere('user_id', 1)
                ->where('review_id', null)
                ->get();
        foreach ($collection as $value) {
            if ($value->name == $name) {
                return $noti = ['error' => 1];
            }
        }

        return $noti = ['error' => 0];
    }

    public function create(array $input)
    {
        $collection = new Collection;
        $collection->name = $input['name'];
        $collection->user_id = $input['user_id'];
        $collection->save();
        return $collection->id;
    }

    public function update(array $input, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->name = $input['name'];
        $collection->save();
    }

    public function checkIfIn($id)
    {
        $collection = Collection::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->orWhere('user_id', 1);
        })->where('review_id', $id)
                ->get();
        if ($collection != null) {
            return $collection;
        } else {
            return 'exist';
        }
    }
    public function findCollectionVals($review_id, $collection_id)
    {
        $collection = Collection::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->orWhere('user_id', 1);
        })
        ->where('review_id', $review_id)
        ->where('collection_id', $collection_id)
        ->first();
        return $collection;
    }

    public function findUserCollectionReview($user_id)
    {
        return Collection::whereIn('user_id', [$user_id, 1])
            ->where('review_id', '<>', null)
            ->get();
    }

    public function checkExist($review_id, $collection_id) {
        $collection = Collection::where(function ($query) {
            $query->where('user_id', Auth::user()->id)
                ->orWhere('user_id', 1);
        })
            ->where('review_id', $review_id)
            ->where('collection_id', $collection_id)
            ->get();

        return $collection->count();
    }

    public function delete($id)
    {
        return Collection::destroy($id);
    }

    public function destroy($collectionId)
    {
        return Collection::destroy($collectionId);
    }
}
