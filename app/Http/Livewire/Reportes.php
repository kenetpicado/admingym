<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Precio;
use App\Models\Registro;
use App\Models\Reporte;
use App\Services\my_services;
use App\Traits\MyAlerts;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Reportes extends Component
{
    use WithPagination;
    use MyAlerts;
    protected $paginationTheme = 'bootstrap';

    public $servicio = "PESAS";
    public $plan = "MENSUAL";
    public $beca = 0;
    public $created_at, $nota, $fecha_fin, $monto, $nombre;
    public $cliente_id;

    public $search = null;

    public function mount()
    {
        $this->created_at = date('Y-m-d');
    }

    public function resetInputFields()
    {
        $this->resetExcept(['created_at']);
        $this->resetErrorBag();
    }

    public function render()
    {
        $registro = Registro::fromToday();

        $reportes = Reporte::select([
            'reportes.id',
            'mensaje',
            'created_at',
            'clientes.id as cliente_id',
            'clientes.nombre as cliente_nombre',
        ])
            ->join('clientes', 'reportes.cliente_id', '=', 'clientes.id')
            ->latest('reportes.id')
            ->when($this->search, function ($q) {
                $q->where('clientes.nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%');
            })
            ->paginate(20);

        return view('livewire.reportes', compact('reportes', 'registro'));
    }

    public function delete_reporte($reporte_id)
    {
        Reporte::find($reporte_id)->delete();
        $this->delete();
    }

    /* Cargar modal para relizar un pago */
    public function pagar($cliente_id)
    {
        $cliente = DB::table('clientes')->find($cliente_id, ['id', 'nombre']);
        $this->cliente_id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->emit('open-pagar-modal');
    }

    /* Guardar pago */
    public function pagar_store()
    {
        $this->monto = Precio::getMonto($this->servicio, $this->plan);
        $this->fecha_fin = (new my_services)->get_end($this->plan, $this->created_at);

        $data = $this->validate([
            'servicio' => 'required',
            'plan' => 'required',
            'beca' => 'required|numeric|min:0',
            'created_at' => 'required|date',
            'fecha_fin' => 'required|date',
            'nota' => 'nullable|max:30',
            'monto' => 'required',
            'cliente_id' => 'required',
        ], [
            'monto.required' => 'No hay un precio para el servicio y plan seleccionado.'
        ]);

        Plan::create($data);
        $this->success();
        $this->resetInputFields();
        $this->emit('close-pagar-modal');
    }

    public function refresh()
    {
        $clientes = Cliente::has('planes')->pluck('id');
        Reporte::whereIn('cliente_id', $clientes)->delete();

        $this->lista_actualizada();
    }
}
