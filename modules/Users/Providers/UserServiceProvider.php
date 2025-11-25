<?php

namespace Modules\Users\Providers;

use Carbon\Laravel\ServiceProvider;
use Modules\Users\Domain\Repositories\UserRepositoryInterface;
use Modules\Users\Infrastruture\Persistence\Eloquent\UserRepository;

class UserServiceProvider extends ServiceProvider {
    public function boot() {
        $this->loadApiRoutes();
        $this->loadWebRoutes();
    }

    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    private function loadApiRoutes() {
        $api = __DIR__ . '/../Http/Routes/api.php';

        if(file_exists($api)) {
            $this->loadRoutesFrom($api);
        }
    }

    private function loadWebRoutes() {
        $web = __DIR__ . '/../Http/Routes/web.php';

        if(file_exists($web)) {
            $this->loadRoutesFrom($web);
        }
    }
}