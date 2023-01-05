<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Peso;
use App\Traits\MyAlerts;
use Livewire\Component;

class Pesos extends Component
{
    use MyAlerts;

    public $peso            = null;
    public $cliente         = null;
    public bool $isUpdate   = false;

    protected $rules = [
        'peso.peso'        => 'required|numeric',
        'peso.created_at'  => 'required|date',
        'peso.cliente_id'  => 'required'
    ];

    public function render()
    {
        return view('livewire.pesos', ['pesos' => Peso::cliente($this->cliente->id)->get()]);
    }

    public function resetInputFields()
    {
        $this->resetExcept(['cliente']);
        $this->resetErrorBag();
        $this->create_instance();
    }

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->create_instance();
    }

    public function store()
    {
        $this->validate();
        $this->peso->save();

        $this->success($this->isUpdate);
        $this->resetInputFields();

        $this->emit('close-create-modal');
    }

    public function edit(Peso $peso)
    {
        $this->peso = $peso;
        $this->isUpdate = true;
        $this->emit('open-create-modal');
    }

    public function destroy(Peso $peso)
    {
        $peso->delete();
        $this->delete();
    }

    public function create_instance()
    {
        $this->peso = new Peso();
        $this->peso->created_at = date('Y-m-d');
        $this->peso->cliente_id = $this->cliente->id;
    }
}
