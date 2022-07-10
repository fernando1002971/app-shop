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
     
        //primero creamos las categorias
        $categories = Category::factory(5)->create();

        //por cada categoria creada, ejecutamos la siguiente función
        $categories->each(function ($category) {
            //por cada categoria solicitamos la creación de 20 productos
            $products = Product::factory(20)->make();
            //y guardamos esa relación
            $category->products()->saveMany($products);

             //Ahora vamos a hacer que cada producto tenga 5 imágenes
             //iterando sobre los productos:
             $products->each(function ($p){
               $images= ProductImage::factory(5)->make(); 
                $p->images()->saveMany($images);
             });

        });

      



        //  Category::factory(5)->create(); 


        //  
        //  ProductImage::factory(200)->create(); 
    }
}
