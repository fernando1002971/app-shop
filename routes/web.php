<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\TestController::class,"welcome"]);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Ruta para gestionar el listado de productos para editarlo o eliminarlo
//esta ruta la administra un controlador llamado ProductController usando el método index
Route::get('/admin/products',[App\Http\Controllers\ProductController::class, 'index']); 

//Ruta para gestionar el registro de nuevos productos por medio de un formulario
//es decir solo muestra un formulario
//esta ruta la administra un controlador llamado ProductController usando el método create
Route::get('/admin/products/create',[App\Http\Controllers\ProductController::class, 'create']); 

//GET ==> Consultar información ==> (solo lectura)
//POST ==> Registrar o actualizar información ==> (operación directa)

//Ruta para gestionar el registro de nuevos productos
//esta ruta si gestionará conexión con la BD
//esta ruta la administra un controlador llamado ProductController usando el método store
//esta usa POST en lugar de GET
Route::post('/admin/products',[App\Http\Controllers\ProductController::class, 'store']); 


//Ruta para gestionar un formulario de actualización de productos
//esta ruta la administra un controlador llamado ProductController usando el método edit
//para esta ruta le pasamos el id a editar y el método del controlador lo recibirá
//esta ruta usa GET
Route::get('/admin/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit']);

//Ruta para gestionar la actualización de productos
//esta ruta si gestionará conexión con la BD
//esta ruta la administra un controlador llamado ProductController usando el método update
//esta ruta usa POST
Route::post('/admin/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'update']);


//Ruta para gestionar la eliminación de productos
//esta ruta si gestionará conexión con la BD
//esta ruta la administra un controlador llamado ProductController usando el método destroy
//esta ruta usa POST bajo el alias DELETE
Route::delete('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);