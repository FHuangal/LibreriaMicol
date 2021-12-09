<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'stock',
        'imagen',
        'precio_venta',
        'lugar',
        'estado',
        'category_id',
        'proveedor_id',
    ];

    public function category(){
        return $this -> belongsTo(Category::class);
    }
    public function proveedor(){
        return $this -> belongsTo(Proveedor::class);
    }
}
