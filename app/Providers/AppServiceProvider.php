<?php

namespace App\Providers;

use App\Auth\AdminSessionGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->addAdminGuard();
    }

    private function addAdminGuard()
    {
        Auth::extend('admin-session', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider']);

            return new AdminSessionGuard(
                $name,
                $provider,
                $app['session.store'],
                $app['request']
            );
        });
    }
}
