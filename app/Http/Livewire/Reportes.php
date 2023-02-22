<?php

namespace App\Http\Livewire;

use App\Jobs\UpdateNotificationsList;
use App\Models\Cliente;
use App\Models\Plan;
use App\Models\Reporte;
use App\Services\PlanService;
use App\Traits\MyAlerts;
use App\Traits\RulesTraits;
use Livewire\Component;
use Livewire\WithPagination;

class Reportes extends Component
{
    use WithPagination;
    use MyAlerts;
    use RulesTraits;
    protected $paginationTheme = 'bootstrap';

    public $plan    = null;
    public $search  = null;
    public $created_at = null;

    public $cliente = null;

    public function render()
    {
        return view('livewire.reportes', [
            'reportes' => Reporte::withCliente()
                ->searching($this->search)
                ->latest('id')
                ->paginate(),
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
        $this->cliente = $cliente;
        (new PlanService)->buildInstance($this->plan);

        $this->created_at = $created_at;
        $this->emit('open-create-modal');
    }

    public function store()
    {
        $this->plan->addMissingData();
        $this->validate();
        $this->cliente->planes()->save($this->plan);

        $this->success();
        $this->resetInputFields();

        $this->emit('close-create-modal');
    }

    public function refresh()
    {
        UpdateNotificationsList::dispatch();
        $this->lista_actualizada();
    }
}
