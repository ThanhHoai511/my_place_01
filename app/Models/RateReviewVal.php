<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateReviewVal extends Model
{
    protected $table = 'rate_review_vals';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function rateReview()
    {
        return $this->belongsTo(RateReview::class);
    }
}
