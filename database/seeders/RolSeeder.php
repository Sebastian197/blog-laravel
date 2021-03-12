<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::truncate();

        Rol::create([
            'key' => "admin",
            'name' => "Administrador",
            'description' => "Este rol tiene todos los permisos de la aplicación",
        ]);

        Rol::create([
            'key' => "user",
            'name' => "Usuario",
            'description' => "Este rol no tiene permisos en la aplicación",
        ]);
    }
}