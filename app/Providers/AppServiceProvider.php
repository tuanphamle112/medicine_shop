<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $infoWebsite = \App\InforWebsite::getInfoWebsite()->first();
        if (!$infoWebsite) $infoWebsite = new \App\InforWebsite;
        view()->share('frontendInfoWebsite', $infoWebsite);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
