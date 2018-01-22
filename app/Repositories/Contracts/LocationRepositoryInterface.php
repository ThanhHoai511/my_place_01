<?php

namespace App\Repositories\Contracts;

interface LocationRepositoryInterface
{
    public function create($input, $id);

    public function all();

    public function findOrFail($id);

    public function delete($placeId);
}
