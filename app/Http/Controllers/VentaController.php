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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VentaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $ventas = Venta::with('Cliente','User')->get();
        return view('admin.venta.index',compact('ventas'));
    }

    
    public function create()
    {
        $clientes = Cliente::get();
        $productos = Producto::select('productos.*')
        ->where('productos.stock', '>', '0')
        ->where('productos.estado', '=', 'ACTIVADO')
        ->get();
        return view('admin.venta.create', compact('clientes','productos'));
    }

    public function Store(StoreRequest $request)
    {

        DB::beginTransaction();
        try {
            
           $venta = Venta::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'venta_date'=>Carbon::now('America/Lima'),
        ]);
        foreach($request->producto_id as $key => $producto){

            $results[] = array(
                'producto_id'=>$request->producto_id[$key],
                'cantidad'=>$request->cantidad[$key],
                'precio'=>$request->precio_venta[$key],
                'descuento'=>$request->descuento[$key]);

            //act stock

            $product = Producto::find($request->producto_id[$key]);
            $product->stock = $product->stock - $request->cantidad[$key];
            $product->save();
        }
        
        $venta->DetalleVenta()->createMany($results);
        DB::commit();

        return redirect('/voucher/'.$venta->id);

        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->back()->with('Ventag','error');
        }

        
    }

  
    public function show(Venta $venta)
    {
        return redirect('/voucher/'.$venta->id);
    }

    public function edit(Venta $venta)
    {

    }


    public function Update(UpdateRequest $request, Venta $venta)
    {

    }

   
    public function destroy(Venta $venta)
    {

    }

    public function voucher($id){

        $venta = DB::table("ventas")
        ->select('*')
        ->where('ventas.id','=',$id)
        ->first();

        $details=DB::table('detalle_ventas as sd')
        ->join('productos as p', 'p.id','=','sd.producto_id')
        ->select('sd.cantidad as cantidad','sd.precio as precio', 'p.nombre as producto', 'sd.descuento as descuento')
        ->where('sd.venta_id','=',$id)
        ->get();

        $cliente=DB::table('clientes as c')
        ->join('ventas as s', 'c.id','=','s.cliente_id')
        ->select('c.*')
        ->where('s.id','=',$id)
        ->first();
        $user=DB::table("users as u")
        ->join('ventas as s', 'u.id','=','s.user_id')
        ->select('u.name as name')
        ->where('s.id','=',$id)
        ->first();
        
        return view("admin.venta.voucher",["venta" => $venta,"details" => $details,"cliente" => $cliente,"user"=>$user]);

    }
}
