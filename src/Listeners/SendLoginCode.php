<?php

namespace SajjadRakhshani\LaravelLoginCode\Listeners;

use Illuminate\Support\Facades\Log;
use SajjadRakhshani\LaravelLoginCode\Events\LoginRequest;

class SendLoginCode
{
    public function handle(LoginRequest $loginRequest): void
    {
        Log::alert('code: ' . $loginRequest->code);
    }
}
