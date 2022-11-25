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

    public function lista_actualizada()
    {
        $this->alert('success', "Lista actualizada correctamente");
    }

    public function delete($deleted = true)
    {
        $this->alert('error',  $deleted ? config('app.deleted') : config('app.undeleted'));
    }
}
