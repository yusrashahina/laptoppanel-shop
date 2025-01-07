<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $services = [
        'user.service' => \App\Services\UserService::class,
        'user.preference.service' => \App\Services\UserPreferenceService::class,
    ];

    public function register(): void
    {
        foreach ($this->services as $key => $class) {
            $this->app->singleton($key, function () use ($class) {
                return new $class;
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
