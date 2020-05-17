<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\AnInterface as inter;
use App\AnImplementer as imp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    
    public function register()
    {
       
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
