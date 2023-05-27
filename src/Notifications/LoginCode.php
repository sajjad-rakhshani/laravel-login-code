<?php

namespace SajjadRakhshani\LaravelLoginCode\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class LoginCode extends Notification
{
    use Queueable;

    public function __construct(public int $code)
    {
    }

    public function via(object $notifiable): array
    {
        return [LogChannel::class];
    }

    public function toArray(object $notifiable): array
    {
        return [
        ];
    }
}
