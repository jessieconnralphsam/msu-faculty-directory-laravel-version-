<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FacultyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->singleton(CollegeService::class, function ($app) {
            return new CollegeService();
        });

        $this->app->singleton(ProfileService::class, function ($app) {
            return new ProfileService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
