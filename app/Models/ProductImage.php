<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class ProductImage extends Model
{
    use HasFactory;
    public function product(){
        //Una  serie de imagenes pertenecen a un producto determinado
        return $this->belongsTo(Product::class);

    }
}

