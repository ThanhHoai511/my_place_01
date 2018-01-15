<?php

namespace App\Repositories\Contracts;

interface CityRepositoryInterface
{
    public function all();

    public function search($key);
    
    public function findOrFail($id);

    public function showCity();

    public function paginate();

    public function update(array $input, $id);

    public function delete($id);
}
