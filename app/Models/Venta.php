<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [

    'cliente_id',
    'user_id',
    'comprobante_id',
    'venta_date',
    'tax',
    'total',
    'estado',
    
];
public function user(){
    return $this->belongsTo(User::class);
}
public function cliente(){
    return $this->belongsTo(Cliente::class);
}
public function DetalleVenta(){
    return $this->hasMany(DetalleVenta::class);
}

public function comprobante(){

    return $this->belongsTo(Comprobante::class,'comprobante_id');
    }
  }
