<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductImage;
class Product extends Model
{
    use HasFactory;
    public function category(){
        //Un producto pertenece a una categoria
        return $this->belongsTo(Category::class);
    }
    //un Producto tiene muchas imagenes
    public function images(){
        return $this->hasMany(ProductImage::class);

    }
}
