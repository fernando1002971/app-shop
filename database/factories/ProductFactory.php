<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //generamos para el campo nombre una palabra aleatoria
            "name" => substr(fake()->sentence(3),0,-1),
            //para la descripción una oración de 10 caracteres
            "description" => fake()->sentence(10),
            //para la descripción larga un texto
            "long_description" => fake()->text(),
            //para el precio un decimal de dos posiciones despúes del punto
            //precio minimo 5 maximo 150
            "price" => fake()->randomFloat(2, 5, 150),
            //categorias
            "category_id" => fake()->numberBetween(1,5)
        ];
    }
}
