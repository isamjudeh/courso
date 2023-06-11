<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;

        return NotificationResource::collection($notifications);
    }

    public function destory(Notification $notification)
    {
        $notification->delete();

        return response()->noContent();
    }
}
