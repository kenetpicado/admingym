<?php

namespace App\Http\Livewire;

use App\Models\Entrenador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Personal extends Component
{
    public $sub_id, $nombre, $telefono, $horario;

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function render()
    {
        $personal = DB::table('entrenadors')
            ->orderBy('nombre')
            ->get();
        return view('livewire.personal', compact('personal'));
    }

    /* Guardar personal */
    public function store()
    {
        $data = $this->validate([
            'nombre' => 'required|max:50',
            'telefono' => 'required|numeric|digits:8',
            'horario' => 'required|max:20'
        ]);

        Entrenador::updateOrCreate(['id' => $this->sub_id], $data);
        session()->flash('message', $this->sub_id ?  config('app.update') : config('app.add'));
        $this->reset();
        $this->emit('close-create-modal');
    }

    /* Cargar modal para editar un personal */
    public function edit($persona_id)
    {
        $persona = DB::table('entrenadors')->find($persona_id);
        $this->sub_id = $persona->id;
        $this->nombre = $persona->nombre;
        $this->telefono = $persona->telefono;
        $this->horario = $persona->horario;
        $this->emit('open-create-modal');
    }
}
