<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Reporte;
use App\Services\ReporteService;
use App\Traits\MyAlerts;
use Livewire\Component;
use Livewire\WithPagination;

class Reportes extends Component
{
    use WithPagination;
    use MyAlerts;
    protected $paginationTheme = 'bootstrap';

    public $plan    = null;
    public $search  = null;
    public $nombre  = null;
    public $created_at = null;

    protected $rules = [
        'plan.servicio'     => 'required',
        'plan.plan'         => 'required',
        'plan.beca'         => 'required|numeric|min:0',
        'plan.created_at'   => 'required|date',
        'plan.nota'         => 'nullable|max:30',
        'plan.monto'        => 'required|numeric',
        'plan.fecha_fin'    => 'required|date',
        'plan.cliente_id'   => 'required',
    ];

    protected $messages = [
        'plan.monto.required' => 'No hay un precio para el servicio y plan seleccionado.'
    ];

    public function render()
    {
        return view('livewire.reportes', [
            'reportes' => Reporte::withCliente()->searching($this->search)->latest('id')->paginate(20),
        ]);
    }

    public function mount()
    {
        $this->plan = new Plan();
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->plan = new Plan();
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        $this->delete();
    }

    public function create(Cliente $cliente, $created_at)
    {
        $this->plan->servicio = "PESAS";
        $this->plan->plan = "MENSUAL";
        $this->plan->beca = 0;
        $this->plan->created_at = date('Y-m-d');
        $this->plan->cliente_id = $cliente->id;

        $this->nombre = $cliente->nombre;
        $this->created_at = $created_at;

        $this->emit('open-create-modal');
    }

    public function store()
    {
        $this->plan->addMissingData();

        $this->validate();
        $this->plan->save();

        $this->success(true);
        $this->resetInputFields();

        $this->emit('close-create-modal');
    }

    public function refresh()
    {
        (new ReporteService)->refresh();
        $this->lista_actualizada();
    }
}
