<?php
use App\Models\Producto;

function notificacion()
{
    return Producto::where('stock', '<=', 10)
    ->orderBy('id', 'desc')
    ->get();
}

