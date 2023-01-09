<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Historial extends Component
{
    public $cliente;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function render()
    {
        return view('livewire.historial', [
            'registros' => DB::table('ingresos')
                ->where('concepto', 'like', "%{$this->cliente->nombre}%")
                ->orWhere('descripcion', 'CLIENTE: ' . $this->cliente->id)
                ->latest('id')
                ->get()
        ]);
    }
}
