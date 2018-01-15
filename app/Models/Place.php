<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $guarded = [];

    public function dist()
    {
        return $this->belongsTo(Dist::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function getImagePlaceAttribute()
    {
        return config('asset.image_path.imagereviews') . $this->image;
    }
}
