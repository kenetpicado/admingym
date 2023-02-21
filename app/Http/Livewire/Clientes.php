<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Plan;
use App\Services\PlanService;
use App\Traits\MyAlerts;
use App\Traits\RulesTraits;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    use WithPagination;
    use MyAlerts;
    use RulesTraits;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';

    public $cliente = null;
    public $plan = null;

    public bool $savePlan = true;
    public bool $saveCliente = true;

    public string $nombre = "";
    public string $fecha = "";
    public string $sexo = "F";

    protected $rulesCliente = [
        'nombre'    => 'required|max:50',
        'fecha'     => 'required|date',
        'sexo'      => 'required|in:M,F',
    ];

    public function render()
    {
        $clientes = Cliente::query()
            ->searching($this->search)
            ->latest('id')
            ->withCount('planes')
            ->paginate(20);

        return view('livewire.clientes', compact('clientes'));
    }

    public function mount()
    {
        $this->createClienteInstance();
        $this->createPlanInstance();
    }

    public function store()
    {
        if ($this->saveCliente) {
            $this->storeCliente();
        }

        if ($this->savePlan) {
            $this->storePlan();
        }

        $this->success();
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    public function storeCliente()
    {
        $data = $this->validate($this->rulesCliente);
        $this->cliente = Cliente::updateOrCreate(['id' => $this->cliente->id], $data);
    }

    public function storePlan()
    {
        $this->plan->addMissingData();
        $this->validate();
        $this->cliente->planes()->save($this->plan);
    }

    public function edit(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->nombre = $cliente->nombre;
        $this->fecha = $cliente->fecha;
        $this->sexo = $cliente->sexo;
        $this->savePlan = false;

        $this->emit('open-create-modal');
    }

    public function pagar(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->saveCliente = false;
        $this->emit('open-create-modal');
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->mount();
    }

    public function destroy(Cliente $cliente)
    {
        if (($result = $cliente->planes->count()) == 0) {
            $cliente->delete();
        }

        $this->delete(!$result);
    }

    public function createClienteInstance()
    {
        $this->cliente = new Cliente();
        $this->fecha = date('Y-m-d');
    }

    public function createPlanInstance()
    {
        $this->plan = new Plan();
        (new PlanService)->buildInstance($this->plan);
    }
}
