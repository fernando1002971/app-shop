<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class TestController extends Controller
{
    public function welcome(){
        //guardamos en la variable productos todos los registros de 
        //la tabla productos
        $products=Product::all();
        //convertimos los datos a un arreglo asociativo clave-valor
        return view('welcome')->with(compact('products'));
    }

}
