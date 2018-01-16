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

    public function findReview($id)
    {
        return Review::where('status', '=', config('checkbox.checktrue'))->where('user_id', '=', $id)->get();
    }

    public function edit($dataValue, $id)
    {
        $review = Review::findOrFail($id);
        $review->submary = $dataValue['submary'];
        $review->place_id = $dataValue['place_id'];
        $review->timewrite = $dataValue['timewrite'];
        $review->service_rate = $dataValue['service_rate'];
        $review->quality_rate = $dataValue['quality_rate'];
        $review->save();
    }

    public function findPlace($id)
    {
        return Review::where('status', '=', config('checkbox.checktrue'))->where('place_id', '=', $id)->get();
    }

    public function countReview($id)
    {
        return Review::where('status', '=', config('checkbox.checktrue'))->where('place_id', '=', $id)->count();
    }
}
