<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Models\RateReviewVal;

class RateReviewValRepository implements RateReviewValRepositoryInterface
{
    public function all()
    {
        return RateReviewVal::all();
    }
}
