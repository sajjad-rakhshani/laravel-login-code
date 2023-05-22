<?php

namespace SajjadRakhshani\LaravelLoginCode\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoginRequest
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $code;
    public function __construct(public User $user){
        $this->code = mt_rand(11111,99999);
        setcookie('code_sent', $user->mobile, strtotime(now()->addMinutes(2)), '/');
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
