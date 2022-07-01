<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //vamos a crear una imágen fictia de 250 x 250
            "image" =>fake()->imageUrl(250,250),
            //el product_id es un valor entre 1 y 100
            "product_id" =>fake()->numberBetween(1,100),
        ];
    }
}
