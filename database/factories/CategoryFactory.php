<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //nombre del producto con la primera letra en mayusculas
            "name" => ucfirst(fake()->word()),
            //para la descripción una oración de 10 caracteres
            "description" => fake()->sentence(10),
        ];
    }
}
