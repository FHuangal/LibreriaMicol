<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $compras = Compra::with('Proveedor','User')->get();
        foreach ($compras as $compra) {
            foreach ($compra->DetalleCompra as $DetalleCompra) {
                $DetalleCompra->producto;
            }
        }
        return view('admin.compra.index',compact('compras'));
    }

    
    public function create()
    {
        $categories= Category::get();
        $proveedors = Proveedor::get();
        $products = Producto::get();
        return view('admin.compra.create', compact('proveedors','products','categories'));
    }

    public function Store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            
            $compra = Compra::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'compra_date'=>Carbon::now('America/Lima'),
        ]);

        foreach($request->productlist as $key => $producto){

            $results[] = array(
                'producto_id'=>$request->productlist[$key],
                'cantidad'=>$request->cantidad[$key],
                'precio'=>$request->precio[$key]);

            //act stock 
            $product = Producto::find($request->productlist[$key]);
            $product->stock = $product->stock + $request->cantidad[$key];
            $product->save();
        }
        
        $compra->DetalleCompra()->createMany($results);
        DB::commit();
        return redirect()->route('compras.index')->with('Comprag','ok');

        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->back()->with('Comprag','error');
        }
        
    }

  
    public function show($id)
    {
        
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
