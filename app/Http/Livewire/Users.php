<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{
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
}
