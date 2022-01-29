<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Compra;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function venta_fecha($fi=null,$ff=null){
        
        $ventas = Venta::whereDate('venta_date', Carbon::today('America/Lima'))->get();
        return view('admin.reporte.ventas_fecha', compact('ventas','fi','ff'));
    }
    public function venta_resultados(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $ventas = Venta::whereBetween('venta_date', [$fi, $ff])->get();
        return view('admin.reporte.ventas_fecha', compact('ventas','fi','ff'));
    }

    public function compra_fecha($fi=null,$ff=null){
        $compras = Compra::whereDate('compra_date', Carbon::today('America/Lima'))->get();
        return view('admin.reporte.compras_fecha', compact('compras','fi','ff'));
    }
    public function compra_resultados(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $compras = Compra::whereBetween('compra_date', [$fi, $ff])->get();
        return view('admin.reporte.compras_fecha', compact('compras','fi','ff'));

    }

    public function almacen(){
        $productosv=DB::select('SELECT sum(dv.cantidad) as cantidad, p.nombre as nombre , p.id as id from productos p 
        inner join detalle_ventas dv on p.id=dv.producto_id 
        inner join ventas v on dv.venta_id=v.id where v.estado="VALIDO" 
        and year(v.venta_date)=year(curdate()) 
        group by p.nombre, p.id order by sum(dv.cantidad) desc limit 5');
        return view('admin.reporte.reporte_almacen',compact('productosv'));
    }

    public function generarvPDF(Request $request){
        $fi = $request->fi. ' 00:00:00';
        $ff = $request->ff. ' 23:59:59';
        $ventas = Venta::whereBetween('venta_date', [$fi, $ff])->get();
        return view('admin.reporte.pdfventa', compact('ventas'));
    }

    public function generarcPDF(Request $request){
        $fi = $request->fi. ' 00:00:00';
        $ff = $request->ff. ' 23:59:59';
        $compras = Compra::whereBetween('compra_date', [$fi, $ff])->get();
        return view('admin.reporte.pdfcompra', compact('compras'));
    }

    public function almacenPDF(){
        $productosv=DB::select('SELECT sum(dv.cantidad) as cantidad, p.nombre as nombre , p.id as id from productos p 
        inner join detalle_ventas dv on p.id=dv.producto_id 
        inner join ventas v on dv.venta_id=v.id where v.estado="VALIDO" 
        and year(v.venta_date)=year(curdate()) 
        group by p.nombre, p.id order by sum(dv.cantidad) desc limit 5');
        return view('admin.reporte.pdfalmacen',compact('productosv'));
    }
}
