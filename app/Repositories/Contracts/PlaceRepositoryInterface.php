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

    public function addPlace($namePlace, $address, $image);

    public function countReview($placeId);

    public function updateQualityRate($dataValue);

    public function updateRateAll($dataValue, $id);

    public function updateServiceRate($dataValue, $id);
}
