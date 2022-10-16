<?php

namespace App\Http\Livewire;

use App\Models\Precio;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Precios extends Component
{
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
        session()->flash('message',  config('app.add'));
        $this->reset();
        $this->emit('close-create-modal');
    }
}
