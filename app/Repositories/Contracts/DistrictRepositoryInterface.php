<?php

namespace App\Repositories\Contracts;

interface DistrictRepositoryInterface
{
    public function all();

    public function search($key);
    
    public function findOrFail($id);

    public function showDist();

    public function searchInCity($city_id);

    public function paginate();

    public function update(array $input, $id);

    public function delete($id);
}
