<?php

namespace SajjadRakhshani\LaravelLoginCode\Listeners;

use App\Events\LoginRequest;
use App\Models\LoginCode;
use Illuminate\Support\Facades\Hash;

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
