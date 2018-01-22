<?php

namespace App\Repositories\Contracts;

interface CategoryValRepositoryInterface
{
    public function all();

    public function find($id);

    public function getCate($cateId);

    public function getCatePlace($placeId);

    public function paginate();

    public function create(array $input);

    public function update(array $input, $id);

    public function delete($id);
}
