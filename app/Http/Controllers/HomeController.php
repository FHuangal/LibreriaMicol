<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $comprasmes=DB::select('SELECT month(c.compra_date) as mes, sum(c.total) as totalmes from compras c where c.estado="VALIDO" group by month(c.compra_date) order by month(c.compra_date) desc limit 12');
        $ventasmes=DB::select('SELECT month(v.venta_date) as mes, sum(v.total) as totalmes from ventas v where v.estado="VALIDO" group by month(v.venta_date) order by month(v.venta_date) desc limit 12');

        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE(c.compra_date)=curdate() and c.estado="VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from ventas v where DATE(v.venta_date)=curdate() and v.estado="VALIDO") as totalventa');
       
        return view('home', compact( 'comprasmes', 'ventasmes', 'totales'));
    }
}
