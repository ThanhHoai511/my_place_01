<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dist extends Model
{
    protected $table = 'dists';
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
