<?php

namespace App\Repositories\Eloquents;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use App\Models\Notification;
use Auth;
use Log;
use App\Events\DisableNotificaton;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function create(array $notificationData)
    {
        $notification = Notification::firstOrCreate($notificationData);

        return $notification;
    }

    public function findAndDelete($reviewId)
    {
        $notification = Notification::where('user_id', '=', Auth::user()->id)->where('review_id', '=', $reviewId)->where('action', '=', config('notification.like'))->first();
        event(new DisableNotificaton($notification->status, $notification->review->user_id));
        return Notification::destroy($notification->id);
    }

    public function changeStatus($id)
    {
        return Notification::where('id', $id)->update(['status' => config('notification.seen')]);
    }
}