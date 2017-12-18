<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CateVal extends Model
{
    protected $table = 'cate_vals';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
