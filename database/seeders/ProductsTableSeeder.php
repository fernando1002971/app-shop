<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make crea objeto mientras create además los ejecuta en la
        //base de datos
     Category::factory(5)->create(); 
     Product::factory(100)->create(); 
     ProductImage::factory(200)->create(); 
    }
}
