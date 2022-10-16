<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Peso;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pesos extends Component
{
    public $cliente, $peso, $created_at, $sub_id, $cliente_id;

    public function resetInputFields()
    {
        $this->reset(['peso', 'sub_id']);
        $this->resetErrorBag();
    }

    public function mount($cliente_id)
    {
        $this->created_at = date('Y-m-d');
        $this->cliente = Cliente::find($cliente_id);
        $this->cliente_id = $cliente_id;
    }

    public function render()
    {
        $pesos = DB::table('pesos')->where('cliente_id', $this->cliente->id)->get();
        return view('livewire.pesos', compact('pesos'));
    }

    /* Guardar peso */
    public function store()
    {
        $data = $this->validate([
            'peso' => 'required|numeric|min:0',
            'created_at' => 'required|date',
            'cliente_id' => 'required'
        ]);

        Peso::updateOrCreate(['id' => $this->sub_id], $data);
        session()->flash('message', $this->sub_id ?  config('app.update') : config('app.add'));
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    /* Cargar modal para editar un peso */
    public function edit($peso_id)
    {
        $peso = DB::table('pesos')->find($peso_id);
        $this->sub_id = $peso->id;
        $this->peso = $peso->peso;
        $this->created_at = $peso->created_at;
        $this->emit('open-create-modal');
    }
}
