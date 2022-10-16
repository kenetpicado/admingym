<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Precio;
use App\Services\my_services;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $sub_id, $nombre, $fecha;
    public $sexo = "F";

    public $servicio = "PESAS";
    public $plan = "MENSUAL";
    public $beca = 0;
    public $created_at, $nota, $fecha_fin, $monto;
    public $cliente_id;

    protected $rules = [
        'nombre' => 'required|max:50',
        'fecha' => 'required|date',
        'sexo' => 'required|in:M,F'
    ];

    public function mount()
    {
        $this->created_at = date('Y-m-d');
    }

    public function render()
    {
        $clientes = DB::table('clientes')
            ->select([
                'id',
                'nombre',
                'sexo',
                DB::raw('(select count(*) from planes where clientes.id = planes.cliente_id) as planes_count')
            ])
            ->when($this->search, function ($q) {
                $q->where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('id', 'like', '%' . $this->search . '%');
            })
            ->paginate(20);

        return view('livewire.clientes', compact('clientes'));
    }

    public function resetInputFields()
    {
        $this->resetExcept(['created_at']);
        $this->resetErrorBag();
    }

     /* Guardar cliente */
    public function store()
    {
        $data = $this->validate();

        Cliente::updateOrCreate(['id' => $this->sub_id], $data);

        session()->flash('message', $this->sub_id ?  config('app.update') : config('app.add') );
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

     /* Cargar modal para editar un cliente */
    public function edit($cliente_id)
    {
        $cliente = DB::table('clientes')->find($cliente_id);
        $this->sub_id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->fecha = $cliente->fecha;
        $this->sexo = $cliente->sexo;
        $this->emit('open-create-modal');
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
        session()->flash('message',  'Pago guardado correctamente');
        $this->resetInputFields();
        $this->emit('close-pagar-modal');
    }
}
