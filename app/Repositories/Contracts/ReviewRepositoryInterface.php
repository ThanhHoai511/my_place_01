<?php

namespace App\Repositories\Contracts;

interface ReviewRepositoryInterface
{
    public function paginateHome();

    public function listReviewVal();

    public function create($dataValue);

    public function find($id);

    public function all();

    public function update($reviewId);

    public function findReview($id);

    public function edit($dataValue, $id);
}
