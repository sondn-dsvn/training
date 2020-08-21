<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services;
use App\Services\Interfaces;

class AppServiceProvider extends ServiceProvider
{
    private $applicationServices = [
        Interfaces\AuthServiceInterface::class => Services\AuthService::class,
        Interfaces\EmployeeServiceInterface::class => Services\EmployeeService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->applicationServices as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
