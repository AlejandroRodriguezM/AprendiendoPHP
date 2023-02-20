<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Articulo;
use App\Models\Cliente;
use App\Models\Perfil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Perfil::factory(10)->create();
        Cliente::factory(10)->create();
        Articulo::factory(10)->create();
        Cliente::factory(10)->has(Perfil::factory()->count(4))->create();
    }
}
