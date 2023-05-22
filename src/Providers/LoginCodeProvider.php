<?php
namespace SajjadRakhshani\LaravelLoginCode\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SajjadRakhshani\LaravelLoginCode\Events\LoginRequest;
use SajjadRakhshani\LaravelLoginCode\Listeners\CreateLoginCode;
use SajjadRakhshani\LaravelLoginCode\Listeners\SendLoginCode;

class LoginCodeProvider extends ServiceProvider
{
    protected $listen = [
        LoginRequest::class => [
            CreateLoginCode::class,
            SendLoginCode::class
        ]
    ];
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
