<?php

namespace App\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait MyAlerts
{
    use LivewireAlert;

    public function success($is_update = false)
    {
        $this->alert('success',  $is_update ?  config('app.update') : config('app.add'));
    }

    public function delete($deleted = true)
    {
        $this->alert('error',  $deleted ? config('app.deleted') : config('app.undeleted'));
    }
}
