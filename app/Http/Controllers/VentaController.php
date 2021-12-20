<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('Cliente','User')->get();
        return view('admin.venta.index',compact('ventas'));
    }

    
    public function create()
    {
        $clientes = Cliente::get();
        $products = Producto::get();
        return view('admin.venta.create', compact('clientes','products'));
    }

    public function Store(StoreRequest $request)
    {

        DB::beginTransaction();
        try {
            
           $venta = Venta::create($request->all()+[
            'user_id'=>1,
            //Auth::user()->id
            'venta_date'=>Carbon::now('America/Lima'),
        ]);
        foreach($request->producto_id as $key => $producto){

            $results[] = array(
                'producto_id'=>$request->producto_id[$key],
                'cantidad'=>$request->cantidad[$key],
                'precio'=>$request->precio_venta[$key],
                'descuento'=>$request->descuento[$key]);
        }
        
        $venta->DetalleVenta()->createMany($results);
        DB::commit();
        return redirect()->route('ventas.index');

        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->back();
        }

        
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
