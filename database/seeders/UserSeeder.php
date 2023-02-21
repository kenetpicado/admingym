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
        //delete all records
        User::truncate();

        $users = [
            [
                'name' => "Kenet Picado",
                'email' => "kenetpicado1@gmail.com",
                'username' => 'kenetpicado1',
                'password' => Hash::make('26051998'),
            ],
            [
                'name' => "Josiel Alonso",
                'email' => "josielalonso@gmail.com",
                'username' => 'josielalonso',
                'password' => Hash::make('FH42KI86'),
            ],
        ];

        $rootUser = User::create($users[0]);
        $rootUser->assignRole('root');

        $adminUser = User::create($users[1]);
        $adminUser->assignRole('administrador');
    }
}
