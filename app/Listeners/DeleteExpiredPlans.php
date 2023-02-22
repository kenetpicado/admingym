<?php

namespace App\Listeners;

use App\Jobs\CreateReportsJob;
use App\Jobs\RegisterTodayJob;
use App\Jobs\RemovePlansOfTableJob;
use App\Models\Plan;
use App\Models\Registro;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteExpiredPlans
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (!$event->today) {
            $expiredPlans = Plan::expired()->get(['id', 'plan', 'cliente_id']);

            if ($expiredPlans->count() > 0) {
                // Save notifications
                CreateReportsJob::dispatch($expiredPlans);

                // Remove Plans
                RemovePlansOfTableJob::dispatch($expiredPlans->pluck('id'));
            }

            // Create Register of today
            RegisterTodayJob::dispatch($expiredPlans->count());
        }
    }
}
