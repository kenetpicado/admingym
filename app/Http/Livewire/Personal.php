<?php

namespace App\Http\Livewire;

use App\Models\Entrenador;
use App\Traits\MyAlerts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Personal extends Component
{
    use MyAlerts;
    public $sub_id, $nombre, $telefono, $horario;

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    protected $listeners = ['delete_element'];

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
        $this->success($this->sub_id);
        $this->resetInputFields();
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

    public function delete_element($id)
    {
        Entrenador::find($id)->delete();
        $this->delete();
    }
}
