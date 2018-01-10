<?php

namespace App\Repositories\Contracts;

interface ReviewRepositoryInterface
{
    public function paginateHome();

    public function listReviewVal();

    public function create($dataValue);

    public function find($id);

    public function all();
}
