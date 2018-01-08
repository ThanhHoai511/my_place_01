<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Models\RateReview;

class RateReviewRepository implements RateReviewRepositoryInterface
{
    public function findRateLike()
    {
        return RateReview::where('name', 'like', 'Thích')->get();
    }
}
