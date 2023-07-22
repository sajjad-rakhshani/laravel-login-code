<?php

namespace SajjadRakhshani\LaravelLoginCode\Notifications;

use Illuminate\Notifications\Notification;
use SajjadRakhshani\LaravelLoginCode\IppanelSms;
class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        IppanelSms::verify($notifiable->mobile, $notification->code);
    }
}
