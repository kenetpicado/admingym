<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\MyAlerts;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use MyAlerts;

    public $user = null;
    public $user_role = null;
    public $isNew = true;

    public function rules()
    {
        return [
            'user.name' => ['required', 'max:50'],
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
            'user_role' => 'required',
        ];
    }

    public function render()
    {
        $users = User::query()
            ->select('id', 'name', 'email')
            ->noRootUsers()
            ->roleName()
            ->get();

        return view('livewire.users', [
            'users' => $users,
            'roles' => Role::where('name', '!=', 'root')->get(['id', 'name']),
        ]);
    }

    public function mount()
    {
        $this->user = new User();
    }

    public function store()
    {
        $this->validate();

        if ($this->isNew) {
            $this->user->setPassword();
        }

        $this->user->addUsername();
        $this->user->save();
        $this->user->syncRoles($this->user_role);

        $this->success(false);

        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->user = new User();
    }
}
