<?php

namespace App\Jobs;

use App\Models\Cliente;
use App\Models\Reporte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateNotificationsList implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ids = Cliente::query()
            ->whereIn('id', function ($query) {
                $query->select('cliente_id')
                    ->from('planes');
            })
            ->pluck('id');

        if ($ids->count() > 0) {
            Reporte::whereIn('cliente_id', $ids)->delete();
        }
    }
}
