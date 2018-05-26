<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Models\Review;
use App\Models\RateReviewVal;
use App\Models\Notification;
use Auth;

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

    public function search($key)
    {
        return Review::where('submary', 'like', '%' . $key . '%')
            ->get();
    }

    public function create($dataValue)
    {
        $result = Review::create($dataValue);
        $dataNotification = [
            'action' => config('notification.review'),
            'content' => config('notification.contentreview') .  $result->place->name,
            'status' => config('notification.notseen'),
            'review_id' => $result->id,
            'user_id' => Auth::user()->id,
        ];
        $notification = Notification::create($dataNotification);
        return $result;
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

    public function findNameReview($id)
    {
        return Review::where('status', '=', config('checkbox.checktrue'))->where('id', '=', $id)->first();
    }

    public function edit($dataValue, $id)
    {
        $review = Review::findOrFail($id);
        $review->submary = $dataValue['submary'];
        $review->content = $dataValue['content'];
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
