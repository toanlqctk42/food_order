<?php

namespace App\Providers;

use App\Models\category;
use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('FrontEnd.include.banner', function ($view) {
            
            $view->with('categories',category::where('category_status',1)->get());
        });
        view()->composer('FrontEnd.include.dish', function ($view) {
            
            $view->with('categories',category::where('category_status',1)->get());
        });
    }
}
