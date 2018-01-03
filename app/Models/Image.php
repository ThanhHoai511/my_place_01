<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $guarded = [];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function new()
    {
        return $this->belongsTo(News::class);
    }
    
    public function getPathReviewAttribute()
    {
        return config('asset.image_path.imagereviews') . $this->link;
    }
}
