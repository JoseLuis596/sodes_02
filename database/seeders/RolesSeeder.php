<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Insertar roles con idRol secuenciales del 1 al 7
        DB::table('roles')->insert([
            ['idRol' => 1, 'nombre' => 'Administrador'],
            ['idRol' => 2, 'nombre' => 'Gerente General'],
            ['idRol' => 3, 'nombre' => 'Gerente de Producción'],
            ['idRol' => 4, 'nombre' => 'Gerente de Logística'],
            ['idRol' => 5, 'nombre' => 'Encargado de Almacén'],
            ['idRol' => 6, 'nombre' => 'Encargado de Empaque'],
            ['idRol' => 7, 'nombre' => 'Encargado de Aduana'],
        ]);
    }
}
