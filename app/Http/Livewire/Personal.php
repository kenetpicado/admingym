<?php

namespace App\Http\Livewire;

use App\Models\Entrenador;
use App\Traits\MyAlerts;
use Livewire\Component;

class Personal extends Component
{
    use MyAlerts;

    public $entrenador = null;
    public bool $isUpdate = false;

    public function mount()
    {
        $this->entrenador = new Entrenador();
    }

    protected $rules = [
        'entrenador.nombre'     => 'required|max:50',
        'entrenador.telefono'   => 'required|numeric|digits:8',
        'entrenador.horario'    => 'required|max:20'
    ];

    public function render()
    {
        return view('livewire.personal', [
            'personal' => Entrenador::latest('id')->get(),
        ]);
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->entrenador = new Entrenador();
    }

    public function store()
    {
        $this->validate();
        $this->entrenador->save();

        $this->success($this->isUpdate);

        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    public function edit(Entrenador $entrenador)
    {
        $this->entrenador = $entrenador;
        $this->isUpdate = true;

        $this->emit('open-create-modal');
    }

    public function destroy(Entrenador $entrenador)
    {
        $entrenador->delete();

        $this->delete();
    }
}
