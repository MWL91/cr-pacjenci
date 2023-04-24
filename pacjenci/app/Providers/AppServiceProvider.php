<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceContract;
use App\Services\Interfaces\OperationServiceContract;
use App\Services\OperationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthServiceContract::class, AuthService::class);
        $this->app->bind(OperationServiceContract::class, OperationService::class);
    }
}
