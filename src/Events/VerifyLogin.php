<?php

namespace SajjadRakhshani\LaravelLoginCode\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerifyLogin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public User $user, $code)
    {
        $hashed = $user->LoginCode;
        if ($hashed && now()->isBefore($hashed->expire) && Hash::check($code, $hashed->code)){
            Auth::login($this->user, true);
            if (is_null($user->mobile_verified_at)) $user->update(['mobile_verified_at' => now()]);
            setcookie('code_sent', 0, time() - 1, '/');
        }
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
