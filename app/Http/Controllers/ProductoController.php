<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Category;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $productos = Producto::join('categories as c', 'c.id', 'productos.category_id')
        ->select('productos.*', 'c.nombre as category')
        ->where('productos.stock', '>', '0')
        ->where('productos.estado', '=', 'ACTIVADO')
        ->get();
        return view('admin.producto.index',compact('productos'));
    }

    
    public function create()
    {
        $categories = Category::get();
        $proveedors = Proveedor::get();
        return view('admin.producto.create',compact('categories','proveedors'));
    }

    public function Store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            Producto::create($data);
            DB::commit();
            return redirect()->route('productos.index')->with('Productog','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('productos.create')->with('Productog','error');
        }
        
    }

  
    public function show(Producto $producto)
    {
        
    }

    public function edit($id)
    {
        $producto=Producto::find($id);
        $categories = Category::get();
        $proveedors = Proveedor::get();
        return view('admin.producto.edit', compact('producto','categories','proveedors'));
    }


    public function Update(UpdateRequest $request, Producto $producto)
    {
        DB::beginTransaction();
        try {
            $producto->update($request->all());
            DB::commit();
            return redirect()->route('productos.index')->with('Productoe','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('productos.edit')->with('Productoe','error');
        }
        
    }

   
    public function destroy($id)
    {

            $producto=Producto::find($id);
            $producto->estado="DESACTIVADO";
            $producto->update();
            return redirect()->route('productos.index')->with('Productod','ok');
    }
}
