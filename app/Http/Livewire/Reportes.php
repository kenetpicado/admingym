<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Precio;
use App\Models\Registro;
use App\Models\Reporte;
use App\Services\my_services;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Reportes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $servicio = "PESAS";
    public $plan = "MENSUAL";
    public $beca = 0;
    public $created_at, $nota, $fecha_fin, $monto, $nombre;
    public $cliente_id;

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
        $registro = Registro::getToday();
        $reportes = Reporte::index();
        return view('livewire.reportes', compact('reportes', 'registro'));
    }

    public function delete($reporte_id)
    {
        Reporte::find($reporte_id)->delete();
        session()->flash('message',  config('app.deleted'));
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
        $this->monto = Precio::getPrice($this->servicio, $this->plan);
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
        session()->flash('message',  config('app.add'));
        $this->resetInputFields();
        $this->emit('close-pagar-modal');
    }
}