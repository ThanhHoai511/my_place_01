<?php

namespace App\Repositories\Contracts;

interface CollectionRepositoryInterface
{
    public function all();

    public function search($key);
    
    public function findOrFail($id);

    public function paginate();

    public function update(array $input, $id);

    public function userCollection($user_id);

    public function checkUniqueName($name);

    public function findCollectionVals($review_id, $collection_id);

    public function checkExist($review_id, $collection_id);

    public function checkIfIn($id);

    public function delete($id);
}
