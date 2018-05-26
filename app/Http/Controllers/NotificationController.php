<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use Log;

class NotificationController extends Controller
{
    protected $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }
    public function changeStatus(Request $request)
    {
        $this->notificationRepository->changeStatus($request->notificationId);
    }
}
