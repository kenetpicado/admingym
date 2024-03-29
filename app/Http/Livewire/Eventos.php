<?php

namespace App\Http\Livewire;

use App\Models\Entrenador;
use App\Models\Evento;
use App\Traits\MyAlerts;
use Livewire\Component;

class Eventos extends Component
{
    use MyAlerts;

    public $entrenador      = null;
    public $evento          = null;

    public function mount(Entrenador $entrenador)
    {
        $this->entrenador = $entrenador;
        $this->createEventoInstance();
    }

    protected $rules = [
        'evento.tipo'           => 'required',
        'evento.monto'          => 'required|numeric|min:0',
        'evento.nota'           => 'nullable|max:50',
        'evento.created_at'     => 'required|date',
        'evento.entrenador_id'  => 'required'
    ];

    public function render()
    {
        return view('livewire.eventos', [
            'eventos' => Evento::entrenador($this->entrenador->id)->latest('id')->get()
        ]);
    }

    public function resetInputFields()
    {
        $this->reset(['evento']);
        $this->resetErrorBag();

        $this->createEventoInstance();
    }

    public function store()
    {
        $this->validate();
        $this->evento->save();

        $this->created();
        $this->resetInputFields();

        $this->emit('close-create-modal');
    }

    public function createEventoInstance()
    {
        $this->evento = new Evento();
        $this->evento->monto = 0;
        $this->evento->tipo = "PAGO";
        $this->evento->created_at = date('Y-m-d');
        $this->evento->entrenador_id = $this->entrenador->id;
    }
}
