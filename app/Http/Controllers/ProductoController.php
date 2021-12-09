<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Category;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('Category')->get();
        
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

        $data = $request->all();
        if($request->hasFile('imagen')){
            $destination_path = '/images/products';
            $imagen = $request->file('imagen');
            $img_name = $imagen->getClientOriginalName();
            $path = $request->file('imagen')->storeAs($destination_path, $img_name);
            $data['imagen'] = $img_name;
        }
        Producto::create($data);
        return redirect()->route('productos.index');
    }

  
    public function show(Producto $producto)
    {
        return view('admin.producto.show', compact('producto'));
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
        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

   
    public function destroy(Producto $producto)
    {
            $producto->delete();
            return redirect()->route('productos.index');
    }
}
