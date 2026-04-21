<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // public function register(): void
    // {

    // }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        foreach (config('permissions') as $key => $value) {
            Gate::define($value['slug'], function ($user, $tragetUser = null) use ($value) {
                return $user->hasPermissions($value['slug']);
            });
        }
    }
}
