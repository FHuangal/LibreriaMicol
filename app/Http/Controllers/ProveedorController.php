<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\Proveedor\StoreRequest;
use App\Http\Requests\Proveedor\UpdateRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        DB::beginTransaction();
        try {
            Proveedor::create($request->all());
            DB::commit();
            return redirect()->route('proveedors.index')->with('Proveedorg','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('proveedors.create')->with('Proveedorg','error');
        }
        
    }

  
    public function show(Proveedor $proveedor)
    {

    }

    public function edit($id)
    {
        $proveedor=Proveedor::find($id);
        return view('admin.proveedor.edit')->with('proveedor',$proveedor);
    }


    public function Update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $proveedor=Proveedor::find($id);
            $proveedor->update($request->all());
            DB::commit();
            return redirect()->route('proveedors.index')->with('Proveedore','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('proveedors.edit')->with('Proveedore','error');
        }
        
    }

   
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $proveedor=Proveedor::find($id);
            $proveedor->delete();
            DB::commit();
            return redirect()->route('proveedors.index')->with('Proveedord','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('proveedors.index')->with('Proveedord','error');
        }
        
    }
}