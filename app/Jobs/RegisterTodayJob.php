<?php

namespace App\Jobs;

use App\Models\Registro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegisterTodayJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $expiredPlansCount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($expiredPlansCount)
    {
        $this->expiredPlansCount = $expiredPlansCount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Registro::create([
            'created_at' => date('Y-m-d'),
            'status' => $this->expiredPlansCount,
        ]);
    }
}
