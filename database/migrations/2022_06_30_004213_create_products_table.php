<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            //string = varchar =textos cortos
            $table->string("description");
            //text = textos largos
            $table->text("long_description")->nullable();
            $table->float("price");
            //clave foranea de la tabla productos a la tabla categorias
            //primero creamos la columna y como podran existir productos 
            //que no necesariamente pertenezcan a una categoria este
            //campo puede aceptar null
            $table->unsignedBigInteger('category_id')->nullable();
            //despúes vinculamos este campo con el campo id de la tabla categories
            //tal y como lo hacemos en SQL
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
