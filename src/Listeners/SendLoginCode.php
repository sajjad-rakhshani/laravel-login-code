<?php

namespace SajjadRakhshani\LaravelLoginCode\Listeners;

use SajjadRakhshani\LaravelLoginCode\Events\LoginRequest;
use SajjadRakhshani\LaravelLoginCode\Notifications\LoginCode;

class SendLoginCode
{
    public function handle(LoginRequest $loginRequest): void
    {
        $loginRequest->user->notify(new LoginCode($loginRequest->code));
    }
}
