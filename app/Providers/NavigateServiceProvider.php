<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libraries\Navigate;

class NavigateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('navigation', function () {
            return new Navigate();
        });
    }
}
