<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Administrador',
            'username' => 'admin',
            'password' => Hash::make('26051998'),
        ]);

        //
        User::create([
            'name' => 'Josiel Alonso',
            'username' => 'josiel',
            'password' => Hash::make('FH42KI86'),
        ]);

        User::create([
            'name' => 'Manuel Alonso',
            'username' => 'manuel',
            'password' => Hash::make('UY84DE69'),
        ]);

    }
}
