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
    public function findReviewID($id, $userId)
    {
        return RateReviewVal::where('review_id', '=', $id)->where('user_id', '=', $userId)->get()->count();
    }

    public function create($userId, $rateId, $reviewId)
    {
        $newReviewVal = new RateReviewVal;
        $newReviewVal->review_id = $reviewId;
        $newReviewVal->rate_id = $rateId;
        $newReviewVal->user_id = $userId;
        $newReviewVal->save();
    }

    public function disLike($reviewId, $userId)
    {
        return RateReviewVal::where('review_id', '=', $reviewId)->where('user_id', '=', $userId)->first()->delete();
    }

    public function findRate($id)
    {
        return RateReviewVal::where('review_id', '=', $id)->first();
    }

    public function getLikes($reviewId)
    {
        return RateReviewVal::where('review_id', '=', $reviewId)->get()->count();
    }
}
