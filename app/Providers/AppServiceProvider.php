<?php

namespace App\Providers;

use Inertia\Inertia;

use Illuminate\Support\Facades\Session;
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
        //

        Inertia::share('flash', function () {
            return ['danger' => Session::get('danger'), 'successful' => Session::get('successful')];
        });
    }
}
