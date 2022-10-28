<?php

namespace App\Http\Livewire;

use App\Traits\MyAlerts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Contabilidad extends Component
{
    use MyAlerts;

    public $table = "ingresos";
    public $start, $end;
    public $table_insert = "ingresos";
    public $search_concepto = null;

    public $sub_id, $concepto, $descripcion, $monto, $created_at;

    protected $rules = [
        'concepto' => 'required|max:50',
        'descripcion' => 'nullable|max:50',
        'monto' => 'required|numeric|gt:0',
        'created_at' => 'required|date',
    ];

    protected $listeners = ['delete_element'];

    public function resetInputFields()
    {
        $this->resetExcept(['table', 'start', 'end', 'table_insert', 'created_at']);
        $this->resetErrorBag();
    }

    public function mount()
    {
        $this->start = $this->end = $this->created_at = date('Y-m-d');
    }

    public function render()
    {
        $registros = DB::table($this->table)
            ->whereBetween('created_at', [$this->start, $this->end])
            ->when($this->search_concepto, function ($q) {
                $q->where('concepto', 'like', "%" . $this->search_concepto . "%");
            })
            ->latest('id')
            ->get();

        return view('livewire.contabilidad', compact('registros'));
    }

    /* Cargar modal para editar un cliente */
    public function edit($registro_id)
    {
        $registro = DB::table($this->table)->find($registro_id);
        $this->sub_id = $registro->id;
        $this->concepto = $registro->concepto;
        $this->descripcion = $registro->descripcion;
        $this->monto = $registro->monto;
        $this->created_at = $registro->created_at;

        $this->table_insert = $this->table;
        $this->emit('open-create-modal');
    }

    public function store()
    {
        $data = $this->validate();
        DB::table($this->table)->updateOrInsert(['id' => $this->sub_id], $data);

        $this->success($this->sub_id);
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    public function delete_element($id)
    {
        DB::table($this->table)->delete($id);
        $this->delete();
    }
}
