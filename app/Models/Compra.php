<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'user_id',
        'compra_date',
        'tax',
        'total',
        'estado',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    public function DetalleCompra(){
        return $this->hasMany(DetalleCompra::class);
    }
}
