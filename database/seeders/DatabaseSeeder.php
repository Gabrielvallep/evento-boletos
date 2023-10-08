<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TipoUsuario;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         Usuario::factory()->create([
             'nombre' => 'Jenniffer Granados',
             'email' => 'test1@example.com',
             'dui' => '12345678-1',
             'telefono' => '12345678',
             'password'=>'root',
             'id_tipo_usuario' => '1'
         ]);
    }
}
