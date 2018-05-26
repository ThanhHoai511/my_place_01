<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\FollowRepositoryInterface;
use App\Models\Follow;
use Log;
use App\Events\Notifications;
use App\Models\User;
use App\Models\Notification;
use Auth;

class FollowRepository implements FollowRepositoryInterface
{
    public function followUser($dataFollow)
    {
        return Follow::create($dataFollow);
    }

    public function findAndUnFollow($dataUnFollow)
    {
        $follow = Follow::where('userfollower_id', $dataUnFollow['userfollower_id'])->where('userfollowing_id', $dataUnFollow['userfollowing_id'])->first();
        return Follow::destroy($follow->id);
    }

    public function checkFollow($id)
    {
        return Follow::where('userfollower_id', Auth::user()->id)->where('userfollowing_id', $id)->count();
    }
}