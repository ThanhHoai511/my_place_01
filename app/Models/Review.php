<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rateReviewVal()
    {
        return $this->hasMany(RateReviewVal::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
