<?php

namespace App\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait MyAlerts
{
    use LivewireAlert;

    public function created()
    {
        $this->alert('success', "Registro guardado correctamente");
    }

    public function updated()
    {
        $this->alert('success', "Registro actualizado correctamente");
    }

    public function deleted()
    {
        $this->alert('info', "Registro eliminado correctamente");
    }

    public function error($msj)
    {
        $this->alert('error', $msj);
    }
}
