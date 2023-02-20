<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$curso=new Curso();
        $curso->name='Laravel';
        $curso->descripcion="El mejor framework de PHP";
        $curso->categoria="Desarrollo web";
        $curso->save();

        $curso1=new Curso();
        $curso1->name='Node';
        $curso1->descripcion="El mejor framework de Javascript";
        $curso1->categoria="Desarrollo web";
        $curso1->save();*/
        Curso::factory(50)->create();
    }
}
