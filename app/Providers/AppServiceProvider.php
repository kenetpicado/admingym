<?php

namespace App\Providers;

use App\Models\Evento;
use App\Models\Plan;
use App\Observers\EventoObserver;
use App\Observers\PlanObserver;
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
        Plan::observe(PlanObserver::class);
        Evento::observe(EventoObserver::class);
    }
}
