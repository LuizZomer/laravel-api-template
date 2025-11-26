<?php

namespace Modules\Auth\Providers;

use Carbon\Laravel\ServiceProvider;
use Modules\Auth\Domain\Services\TokenService;
use Modules\Auth\Infrastructure\Services\SanctumTokenService;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadApiRoutes();
        $this->loadWebRoutes();
    }

    public function register()
    {
        $this->app->bind(
            TokenService::class,
            SanctumTokenService::class
        );
    }

    private function loadApiRoutes()
    {
        $api = __DIR__ . '/../Http/Routes/api.php';

        if (file_exists($api)) {
            $this->loadRoutesFrom($api);
        }
    }

    private function loadWebRoutes()
    {
        $web = __DIR__ . '/../Http/Routes/web.php';

        if (file_exists($web)) {
            $this->loadRoutesFrom($web);
        }
    }
}
