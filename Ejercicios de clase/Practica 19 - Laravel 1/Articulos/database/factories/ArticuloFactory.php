<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cliente_id'=>Cliente::all()->random()->id,
            'Nombre_Articulo'=>$this->faker->word(),
            'Precio'=>$this->faker->randomFloat(10,20,50),
            'Pais_Origen'=>$this->faker->sentence(),
            'Observaciones'=>$this->faker->sentence(),
            'seccion'=>$this->faker->word()
        ];
    }
}
