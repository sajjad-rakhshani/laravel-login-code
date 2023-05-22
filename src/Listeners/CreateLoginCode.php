<?php

namespace SajjadRakhshani\LaravelLoginCode\Listeners;

use Illuminate\Support\Facades\Hash;
use SajjadRakhshani\LaravelLoginCode\Events\LoginRequest;
use SajjadRakhshani\LaravelLoginCode\Models\LoginCode;

class CreateLoginCode
{
    public function handle(LoginRequest $loginRequest): void
    {
        LoginCode::updateOrCreate([
            'user_id' => $loginRequest->user->id
        ],[
            'code' => Hash::make($loginRequest->code),
            'expire' => now()->addMinutes(2)
        ]);
    }
}
