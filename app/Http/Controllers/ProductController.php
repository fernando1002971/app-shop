<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        //retorna una vista que permitirá  ver el listado
        //de productos

        //vamos a inyectarle a la vista la lista de todos los productos
        //en bloques de 10 usando paginate
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
        //retorna una vista para ver el formulario de registro
        return view('admin.products.create');
    }

    //pasamos un objeto request al método store
    public function store(Request $request)
    {

        //Validaciones 
        //reglas que se ejecutarán en forma de arreglo asociativo
        $rules = [
            //los campos serán requeridos
            "name" => "required|min:3",
            "description" => "required|max:200",
            "price" => "required|numeric|min:0",
        ];
        //mensajes personalizados
        $messages = [
            "name.required" => "El campo nombre es requerido",
            "name.min" => "Se requieren como minimo 3 caracteres",
            "description.required" => "La descripción corta es requerido",
            "description.max" => "La descripción corta admite un máximo de 200 caracteres.",
            "price.required" => "El campo precio es requerido",
            "price.numeric" => "Ingrese un precio valido",
            "price.min" => "No se admiten valores negativos",
        ];
        $this->validate($request, $rules, $messages);



        //permite registrar el nuevo producto en la base de datos
        //esta linea nos devuelve los parámetros 
        //el método dd imprime los argumentos pasados y finalizar el programa
        // dd($request->all());

        //instancia de la entidad product
        $product = new Product();
        //obtenemos los valores del formulario de registro
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        //con los datos anteriormente definidos ejecutamos el método save que ejecuta
        //un INSERT 
        $product->save();
        //como la página se mostrará en blanco 
        //conviene redirigirnos a la página raíz
        return redirect("/admin/products");
    }

    public function edit($id)
    {

        //retorna una vista para ver el formulario de actualización de productos
        //consultamos el producto con el id recibido
        $product = Product::find($id);
        //inyectamos en la vista edit este registro
        return view('admin.products.edit')->with(compact('product'));
    }

    //pasamos un objeto request al método update asi como el $id a actualizar los datos
    public function update(Request $request, $id)
    {
         //Validaciones 
        //reglas que se ejecutarán en forma de arreglo asociativo
        $rules = [
            //los campos serán requeridos
            "name" => "required|min:3",
            "description" => "required|max:200",
            "price" => "required|numeric|min:0",
        ];
        //mensajes personalizados
        $messages = [
            "name.required" => "El campo nombre es requerido",
            "name.min" => "Se requieren como minimo 3 caracteres",
            "description.required" => "La descripción corta es requerido",
            "description.max" => "La descripción corta admite un máximo de 200 caracteres.",
            "price.required" => "El campo precio es requerido",
            "price.numeric" => "Ingrese un precio valido",
            "price.min" => "No se admiten valores negativos",
        ];
        $this->validate($request, $rules, $messages);
        //permite actualizar el nuevo producto en la base de datos
        //esta linea nos devuelve los parámetros 
        //el método dd imprime los argumentos pasados y finalizar el programa
        // dd($request->all());

        //Buscamos o consultamos el producto con el id recibido
        $product = Product::find($id);
        //obtenemos los valores del formulario de actualización
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        //con los datos anteriormente definidos ejecutamos el método save que ejecuta
        //un UPDATE 
        $product->save();
        //conviene redirigirnos a la página raíz una actualizado los datos del registro
        return redirect("/admin/products");
    }

    public function destroy($id)
    {
        //este método permite la eliminación del producto seleccionado
        //consultamos el producto con el id recibido
        $product = Product::find($id);

        //usamos el método delete para eliminar de la base de datos
        $product->delete();

        //usamos el método back para redirigir una página anterior
        return back();
    }
}
