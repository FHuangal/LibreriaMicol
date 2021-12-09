<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::get();
        return view('admin.venta.index',compact('ventas'));
    }

    
    public function create()
    {
        $clientes = Cliente::get();
        return view('admin.venta.create', compact('clientes'));
    }

    public function Store(StoreRequest $request)
    {
        $venta = Venta::create($request->all());

        foreach($request->producto_id as $key => $producto){
            $results[] = array("producto_id"=>$request->producto_id[$key],
            "cantidad"->$request->cantidad[$key], "precio"=>$request->precio[$key],
        "descuento"=>$request->descuento[$key]);
        }
        $venta->DetalleVenta()->cretaeMany($results);

        return redirect()->route('ventas.index');
    }

  
    public function show(Venta $venta)
    {
        return view('admin.venta.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $clientes = Cliente::get();
        return view('admin.venta.show', compact('venta'));
    }


    public function Update(UpdateRequest $request, Venta $venta)
    {
       // $compra->update($request->all());
        //return redirect()->route('compras.index');
    }

   
    public function destroy(Venta $venta)
    {
       // $compra->delete();
       // return redirect()->route('compras.index');
    }
}
