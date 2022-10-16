<?php

namespace App\Http\Livewire;

use App\Models\Entrenador;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Eventos extends Component
{
    public $persona, $entrenador_id;
    public $sub_id, $nota, $created_at;
    public $monto = 0;
    public $tipo = "PAGO";

    protected $rules = [
        'tipo' => 'required',
        'monto' => 'required|numeric|min:0',
        'nota' => 'nullable',
        'created_at' => 'required|date',
        'entrenador_id' => 'required'
    ];

    public function resetInputFields()
    {
        $this->resetExcept(['persona', 'entrenador_id', 'created_at']);
        $this->resetErrorBag();
    }

    public function mount($persona_id)
    {
        $this->created_at = date('Y-m-d');
        $this->entrenador_id = $persona_id;
        $this->persona = Entrenador::find($persona_id, ['id', 'nombre']);
    }

    public function render()
    {
        $eventos = DB::table('eventos')
            ->where('entrenador_id', $this->entrenador_id)
            ->latest('id')
            ->get();
        return view('livewire.eventos', compact('eventos'));
    }

    /* Guardar evento */
    public function store()
    {
        $data = $this->validate();

        Evento::updateOrCreate(['id' => $this->sub_id], $data);
        session()->flash('message', $this->sub_id ?  config('app.update') : config('app.add'));
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }
}
