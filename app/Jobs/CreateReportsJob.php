<?php

namespace App\Jobs;

use App\Models\Reporte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateReportsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $expiredPlans;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($expiredPlans)
    {
        $this->expiredPlans = $expiredPlans;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reports = [];

        foreach ($this->expiredPlans as $key => $plan) {
            $reports[$key] = [
                'mensaje' => $plan->plan,
                'cliente_id' => $plan->cliente_id,
                'created_at' => date('Y-m-d'),
            ];
        }

        Reporte::insert($reports);
    }
}
