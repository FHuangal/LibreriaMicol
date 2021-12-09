<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;

class ProveedorController extends Controller
{
    
    public function index()
    {
        $proveedores = Proveedor::get();
        return view('admin.proveedor.index',compact('proveedores'));
    }

    
    public function create()
    {
        return view('admin.proveedor.create');
    }

    public function Store(StoreRequest $request)
    {
        Proveedor::create($request->all());
        return redirect()->route('proveedors.index');
    }

  
    public function show(Proveedor $proveedor)
    {
        return view('admin.proveedor.show', compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor=Proveedor::find($id);
        return view('admin.proveedor.edit')->with('proveedor',$proveedor);
    }


    public function Update(UpdateRequest $request, $id)
    {
        $proveedor=Proveedor::find($id);
        $proveedor->update($request->all());
        return redirect()->route('proveedors.index');
    }

   
    public function destroy($id)
    {
        $proveedor=Proveedor::find($id);
        $proveedor->delete();
        return redirect()->route('proveedors.index');
    }
}