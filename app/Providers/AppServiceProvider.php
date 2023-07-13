<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Gate;

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
        
        Paginator::useBootstrap();

        Gate::define('manager', function ($user) {
            return $user->role == 'manager';
        });

        Gate::define('admin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('user', function ($user) {
            return $user->role == 'user';
        });
        
        
        
        
    }
}
