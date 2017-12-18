<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateReview extends Model
{
    protected $table = 'rate_reviews';
    protected $guarded = [];

    public function rateReviewVal()
    {
        return $this->hasMany(RateReviewVal::class);
    }
}
