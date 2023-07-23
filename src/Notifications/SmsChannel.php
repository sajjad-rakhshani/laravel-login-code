<?php

namespace SajjadRakhshani\LaravelLoginCode\Notifications;

use Illuminate\Notifications\Notification;
use SajjadRakhshani\LaravelLoginCode\IppanelSms;
use SajjadRakhshani\LaravelLoginCode\Sms;

class SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        (new Sms())->smsPanel::verify($notifiable->mobile, $notification->code);
//        IppanelSms::verify($notifiable->mobile, $notification->code);
    }
}
