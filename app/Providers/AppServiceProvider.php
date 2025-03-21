<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; //add this import class
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
        Paginator::useBootstrapFive(); //This is where pagination do in global
        //Paginator::useBootstrapFour();
        //Paginator::useBootstrap();
    }
}
