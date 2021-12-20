<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{


    public function index()
    {
        $compras = Compra::with('Proveedor','User')->get();
        return view('admin.compra.index',compact('compras'));
    }

    
    public function create()
    {
        $proveedors = Proveedor::get();
        $products = Producto::get();
        return view('admin.compra.create', compact('proveedors','products'));
    }

    public function Store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            
            $compra = Compra::create($request->all()+[
            'user_id'=>1,
            //Auth::user()->id
            'compra_date'=>Carbon::now('America/Lima'),
        ]);

        foreach($request->productlist as $key => $producto){

            $results[] = array(
                'producto_id'=>$request->productlist[$key],
                'cantidad'=>$request->cantidad[$key],
                'precio'=>$request->precio[$key]);
        }
        
        $compra->DetalleCompra()->createMany($results);
        DB::commit();
        return redirect()->route('compras.index');

        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->back();
        }
        
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
