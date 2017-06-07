<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $infoModel = new \App\Eloquent\InforWebsite;
        if (Schema::hasTable($infoModel->getTable())) {
            $infoWebsite = $infoModel->getInfoWebsite()->first();
            if (!$infoWebsite) $infoWebsite = $infoModel;
            view()->share('frontendInfoWebsite', $infoWebsite);
        }

        $categoryModel = new \App\Eloquent\Category;
        if (Schema::hasTable($categoryModel->getTable())) {
            $parentCategories = $categoryModel->allParentCategories()->get();

            view()->share('frontendAllParentCategories', $parentCategories);
        }
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
