<?php

namespace SajjadRakhshani\LaravelLoginCode\Listeners;

use App\Notifications\LoginCode;
use SajjadRakhshani\LaravelLoginCode\Events\LoginRequest;

class SendLoginCode
{
    public function handle(LoginRequest $loginRequest): void
    {
        $loginRequest->user->notify(new LoginCode($loginRequest->code));
    }
}
