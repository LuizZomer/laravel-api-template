<?php

namespace App\Shared\Providers;

use App\Shared\Infraestruture\Service\BcryptPasswordHasher;
use Illuminate\Support\ServiceProvider;
use App\Shared\Domain\Services\PasswordHasher;

class SharedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PasswordHasher::class,
            BcryptPasswordHasher::class
        );
    }
}
