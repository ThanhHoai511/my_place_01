<?php

namespace App\Repositories\Contracts;

interface ReviewRepositoryInterface
{
    public function paginateHome();

    public function listReviewVal();
}
