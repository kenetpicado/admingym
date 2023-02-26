<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Ingreso;
use Livewire\Component;

class Historial extends Component
{
    public $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function render()
    {
        $ingresos = Ingreso::query()
            ->where('concepto', 'like', "%" . $this->cliente->nombre . "%")
            ->orWhere('descripcion', 'CLIENTE: ' . $this->cliente->id)
            ->latest('id')
            ->get();

        return view('livewire.historial', [
            'registros' => $ingresos
        ]);
    }
}
