<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'cate_vals';
    protected $guarded = [];

    public function cateVal()
    {
        return $this->hasMany(CateVal::class);
    }
}
