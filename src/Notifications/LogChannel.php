<?php

namespace SajjadRakhshani\LaravelLoginCode\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class LogChannel
{
    public function send($notifiable, Notification $notification)
    {
        Log::info($notification->code);
    }
}
