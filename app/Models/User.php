<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function collection()
    {
        return $this->hasMany(Collection::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function rateReviewVal()
    {
        return $this->hasMany(RateReviewVal::class); 
    }

    public function follower()
    {
        return $this->hasMany(Follow::class,'userfollower_id');
    }

    public function following()
    {
        return $this->hasMany(Follow::class,'userfollowing_id');
    }
}
