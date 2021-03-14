<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'rol_id' => 1,
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'rol_id' => 2,
            'name' => 'Juan',
            'surname' => 'Márquez',
            'email' => 'Juan@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'rol_id' => 2,
            'name' => 'Ana',
            'surname' => 'Prieto',
            'email' => 'Ana@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
