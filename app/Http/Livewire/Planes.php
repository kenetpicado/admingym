<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Precio;
use App\Models\Registro;
use App\Services\my_services;
use App\Traits\MyAlerts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Planes extends Component
{
    use WithPagination;
    use MyAlerts;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public float $beca = 0;
    public $sub_id, $servicio, $plan, $created_at, $nota, $fecha_fin, $monto;

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function render()
    {
        $registro = Registro::getToday();

        if (!$registro)
            $registro = Plan::deleteExpired();

        $planes = DB::table('planes')
            ->join('clientes', 'planes.cliente_id', '=', 'clientes.id')
            ->orderBy('fecha_fin')
            ->select([
                'planes.id',
                'clientes.nombre as cliente_nombre',
                'created_at',
                'fecha_fin',
                'nota',
                'servicio',
                'plan'
            ])
            ->when($this->search, function ($q) {
                $q->where('clientes.nombre', 'like', '%' . $this->search . '%');
            })
            ->paginate(30);

        return view('livewire.planes', compact('planes', 'registro'));
    }

    /* Cargar modal para editar un cliente */
    public function edit($plan_id)
    {
        $plan = DB::table('planes')->find($plan_id);
        $this->sub_id = $plan->id;
        $this->servicio = $plan->servicio;
        $this->plan = $plan->plan;
        $this->beca = $plan->beca;
        $this->created_at = $plan->created_at;
        $this->nota = $plan->nota;
        $this->emit('open-create-modal');
    }

    /* Guardar plan */
    public function store()
    {
        $this->monto = Precio::getPrice($this->servicio, $this->plan);
        $this->fecha_fin = (new my_services)->get_end($this->plan, $this->created_at);

        if ($this->beca > 0)
            $this->monto = $this->monto - $this->beca;

        $data = $this->validate([
            'servicio' => 'required',
            'plan' => 'required',
            'beca' => 'required|numeric|min:0',
            'created_at' => 'required|date',
            'fecha_fin' => 'required|date',
            'nota' => 'nullable|max:30',
            'monto' => 'required'
        ], [
            'monto.required' => 'No hay un precio para el servicio y plan seleccionado.'
        ]);

        Plan::find($this->sub_id)->update($data);

        $this->success(1);
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        $this->delete();
    }
}
