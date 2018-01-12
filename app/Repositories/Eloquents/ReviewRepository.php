<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Models\Review;
use App\Models\RateReviewVal;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function paginateHome()
    {
        return Review::where('status', '=', config('checkbox.checktrue'))
        ->orderBy('created_at', 'desc')->paginate(config('paginate.paginateHome'));
    }

    public function listReviewVal()
    {
        return $rateReviewVals = RateReviewVal::all();
    }

    public function create($dataValue)
    {
        return $result = Review::create($dataValue);
    }

    public function find($id)
    {
        return Review::where('status', '=', config('checkbox.checktrue'))->findOrFail($id);
    }

    public function all()
    {
        return Review::all();
    }

    public function update($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->status = config('checkbox.checkzero');
        $review->save();
    }
}
