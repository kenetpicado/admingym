<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Peso;
use App\Traits\MyAlerts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pesos extends Component
{
    use MyAlerts;

    public $cliente, $peso, $created_at, $sub_id, $cliente_id;

    public function resetInputFields()
    {
        $this->reset(['peso', 'sub_id']);
        $this->resetErrorBag();
    }

    protected $listeners = ['delete_element'];

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
        $this->success($this->sub_id);
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

    public function delete_element($id)
    {
        Peso::find($id)->delete();
        $this->delete();
    }
}
