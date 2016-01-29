<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.nav', function($view)
        {
            $view->with('user', \Auth::user());
            $view->with('latest', Article::latest()->first());
        });

        view()->composer('articles.index', function($view)
        {
            $view->with('user', \Auth::user());
        });
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
