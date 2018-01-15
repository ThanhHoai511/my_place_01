<?php

namespace App\Repositories\Contracts;

interface PlaceRepositoryInterface
{
    public function all();

    public function search($key);
    
    public function findOrFail($id);

    public function paginate();

    public function create(array $input);

    public function update(array $input, $id);

    public function delete($id);
}
