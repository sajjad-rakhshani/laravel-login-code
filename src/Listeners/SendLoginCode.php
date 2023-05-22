<?php

namespace SajjadRakhshani\LaravelLoginCode\Listeners;

use App\Events\LoginRequest;
use Illuminate\Support\Facades\Log;

class SendLoginCode
{
    public function handle(LoginRequest $loginRequest): void
    {
        Log::alert('code: ' . $loginRequest->code);
    }
}
