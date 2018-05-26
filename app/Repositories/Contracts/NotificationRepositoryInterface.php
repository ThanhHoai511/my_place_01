<?php

namespace App\Repositories\Contracts;

interface NotificationRepositoryInterface
{
    public function create(array $notificationData);

    public function findAndDelete($reviewId);

    public function changeStatus($id);
}
