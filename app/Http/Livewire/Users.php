<?php

namespace App\Http\Livewire;

use App\Mail\UserRegister;
use App\Models\User;
use App\Traits\MyAlerts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use MyAlerts;

    public $user = null;
    public $user_role = [];
    public $isNew = true;
    public $cleanPassword = '';

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
            $this->cleanPassword = Str::random(10);
            $this->user->setPassword($this->cleanPassword);
        }

        $this->user->addUsername();
        $this->user->save();

        $this->user->syncRoles($this->user_role);

        if ($this->isNew) {
            Mail::to($this->user->email)->send(new UserRegister($this->user, $this->cleanPassword));
        }

        $this->created();
        $this->resetInputFields();
        $this->emit('close-create-modal');
    }

    public function edit(User $user)
    {
        $this->user = $user;
        $this->user_role = $user->roles->pluck('name')->toArray();
        $this->emit('open-create-modal');
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->user = new User();
    }

    public function destroy(User $user)
    {
        $user->delete();
        $this->deleted();
    }
}
