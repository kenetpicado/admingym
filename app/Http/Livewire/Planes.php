<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Services\RegistroService;
use App\Traits\MyAlerts;
use Livewire\Component;
use Livewire\WithPagination;

class Planes extends Component
{
    use MyAlerts;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = null;
    public $plan = null;

    protected $rules = [
        'plan.servicio'     => 'required',
        'plan.plan'         => 'required',
        'plan.beca'         => 'required|numeric|min:0',
        'plan.created_at'   => 'required|date',
        'plan.nota'         => 'nullable|max:30',
        'plan.monto'        => 'required|numeric',
        'plan.fecha_fin'    => 'required|date',
    ];

    protected $messages = [
        'plan.monto.required' => 'No hay un precio para el servicio y plan seleccionado.'
    ];

    public function mount()
    {
        $this->plan = new Plan();
    }

    public function render()
    {
        return view('livewire.planes', [
            'registro' => (new RegistroService)->getCurrent(),
            'planes' => Plan::withCliente()->orderBy('fecha_fin')->searching($this->search)->paginate(20)
        ]);
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();

        $this->plan = new Plan();
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

    public function edit(Plan $plan)
    {
        $this->plan = $plan;

        $this->emit('open-create-modal');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        $this->delete();
    }
}
