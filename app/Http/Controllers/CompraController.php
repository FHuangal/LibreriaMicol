<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::get();
        return view('admin.compra.index',compact('compras'));
    }

    
    public function create()
    {
        $proveedors = Proveedor::get();
        return view('admin.compra.create', compact('proveedors'));
    }

    public function Store(StoreRequest $request)
    {
        $compra = Compra::create($request->all());

        foreach($request->producto_id as $key => $producto){
            $results[] = array("producto_id"=>$request->producto_id[$key],
            "cantidad"->$request->cantidad[$key], "precio"=>$request->precio[$key]);
        }
        $compra->DetalleCompra()->cretaeMany($results);

        return redirect()->route('compras.index');
    }

  
    public function show(Compra $compra)
    {
        return view('admin.compra.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        $proveedors = Proveedor::get();
        return view('admin.compra.show', compact('compra'));
    }


    public function Update(UpdateRequest $request, Compra $compra)
    {
       // $compra->update($request->all());
        //return redirect()->route('compras.index');
    }

   
    public function destroy(Compra $compra)
    {
       // $compra->delete();
       // return redirect()->route('compras.index');
    }
}
