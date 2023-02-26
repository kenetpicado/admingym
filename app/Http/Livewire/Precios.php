<?php

namespace App\Http\Livewire;

use App\Models\Precio;
use App\Traits\MyAlerts;
use Livewire\Component;

class Precios extends Component
{
    use MyAlerts;

    public $precio = null;

    public function render()
    {
        return view('livewire.precios', ['precios' => Precio::all()]);
    }

    public function mount()
    {
        $this->precio = new Precio();
    }

    protected $rules = [
        'precio.monto'      => 'required|numeric',
        'precio.servicio'   => 'required',
        'precio.plan'       => 'required'
    ];
    
    public function edit(Precio $precio)
    {
        $this->precio = $precio;
        $this->emit('open-create-modal');
    }

    public function store()
    {
        $this->validate();
        $this->precio->save();

        $this->created();
        $this->resetInputFields();

        $this->emit('close-create-modal');
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();

        $this->precio = new Precio();
    }
}
