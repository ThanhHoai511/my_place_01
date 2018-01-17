<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function dist()
    {
        return $this->belongsTo(Dist::class);
    }
}
