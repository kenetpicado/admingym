<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\MyAlerts;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Perfil extends Component
{
    use MyAlerts;

    public $name = null;
    public $username = null;
    public $password = null;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->username = auth()->user()->username;
    }

    public function resetInputFields()
    {
        $this->reset(['password']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.perfil');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:50',
            'username' => ['required', 'max:20', Rule::unique('users')->ignore(auth()->user()->id)]
        ]);

        User::find(auth()->user()->id)->update([
            'name' => $this->name,
            'username' => $this->username
        ]);

        $this->resetInputFields();
        $this->success();
    }

    public function password()
    {
        $this->validate([
            'password' => 'required|min:6|alpha_dash|confirmed',
        ]);

        User::find(auth()->user()->id)->update([
            'password' => bcrypt($this->password)
        ]);

        $this->resetInputFields();
        $this->success();
    }
}
