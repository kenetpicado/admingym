<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\MyAlerts;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Perfil extends Component
{
    use MyAlerts;

    public $users = null;
    public $password = null;
    public $password_confirmation = null;

    public function mount()
    {
        $this->users = auth()->user();
    }

    protected function rules()
    {
        return [
            'users.name' => 'required|max:50',
            'users.email' => ['required', 'max:50', Rule::unique('users')->ignore($this->users->id)]
        ];
    }

    public function resetInputFields()
    {
        $this->reset(['password']);
        $this->resetErrorBag();

        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.perfil');
    }

    public function store()
    {
        $this->validate();
        $this->users->save();

        $this->created();
        return redirect()->route('index');
    }

    /* No Implementado */
    public function password()
    {
        $this->validate(['password' => 'required|min:8|confirmed']);

        $this->users->password = Hash::make($this->password);
        $this->users->save();

        $this->created();
        return redirect()->route('index');
    }
}
