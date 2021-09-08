<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
        \Blade::if('Administrator', function () {            
            return Auth::user()->hasRole('Administrator');
        });
        \Blade::if('Korisnik', function () {            
            return Auth::user()->hasRole('Korisnik');
        });
        \Blade::if('Gost', function () {            
            return Auth::user()->hasRole('Gost');
        });
    }
}
