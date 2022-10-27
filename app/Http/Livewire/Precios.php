<?php

namespace App\Http\Livewire;

use App\Models\Precio;
use App\Traits\MyAlerts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Precios extends Component
{
    use MyAlerts;
    
    public $sub_id, $servicio, $plan, $monto;

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function render()
    {
        $precios = DB::table('precios')->get();
        return view('livewire.precios', compact('precios'));
    }

    /* Cargar modal para editar un precio */
    public function edit($precio_id)
    {
        $precio = DB::table('precios')->find($precio_id);
        $this->sub_id = $precio->id;
        $this->servicio = $precio->servicio;
        $this->plan = $precio->plan;
        $this->monto = $precio->monto;
        $this->emit('open-create-modal');
    }

     /* Guardar precio */
    public function store()
    {
        $data = $this->validate([
            'monto' => 'required|numeric|gt:0'
        ]);

        Precio::updateOrCreate(['id' => $this->sub_id], $data);
        $this->success(1);
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }
}
