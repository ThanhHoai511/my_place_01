<?php

namespace App\Repositories\Contracts;

interface ImageRepositoryInterface
{
    public function create($data, $placeId);
}
