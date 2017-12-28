<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function cateVal()
    {
        return $this->hasMany(CateVal::class);
    }

    public function get_parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function get_children()
    {
    	return $this->hasMany(Category::class, 'parent_id');
    }
}
