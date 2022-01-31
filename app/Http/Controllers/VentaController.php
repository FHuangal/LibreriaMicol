<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Comprobante;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Luecano\NumeroALetras\NumeroALetras;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade as PDF;

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
        $comprobante= Comprobante::get();
        $productos = Producto::select('productos.*')
        ->where('productos.stock', '>', '0')
        ->where('productos.estado', '=', 'ACTIVADO')
        ->get();
        return view('admin.venta.create', compact('clientes','productos','comprobante'));
    }

    public function Store(StoreRequest $request)
    {

        DB::beginTransaction();
        try {
           $venta = Venta::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'venta_date'=>Carbon::now('America/Lima')->toDateString(),
        ]);
        $client= Cliente::find($venta->cliente_id);
        if (strlen($client->documento) == 8 && $venta->comprobante_id=='2') {
                DB::rollback();
                return redirect()->back()->with('Ventag','dni');
        }
        else if (strlen($client->documento) == 11 && $venta->comprobante_id=='1') {
                DB::rollback();
                return redirect()->back()->with('Ventag','ruc');
        }
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

        } 

        catch (\Exception $e) {
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

        $venta = Venta::find($id);

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

        $legends = self::obtenerLeyenda($venta);
            $legends = json_encode($legends,true);
            $legends = json_decode($legends,true);
        
        $pdf = PDF::loadview("admin.venta.voucher",["venta" => $venta,"details" => $details,"cliente" => $cliente,"user"=>$user,"legends"=>$legends])->setPaper([0, 0, 226.772, 651.95]);

        return $pdf->stream($venta->comprobante->serie.'-'.$venta->id.'.pdf');

    }

    //LO HIZO CARLESSI
    public function obtenerLeyenda($documento)
    {
        $formatter = new NumeroALetras();
        $convertir = $formatter->toInvoice($documento->total, 2, 'SOLES');

        //CREAR LEYENDA DEL COMPROBANTE
        $arrayLeyenda = Array();
        $arrayLeyenda[] = array(
            "code" => "1000",
            "value" => $convertir
        );
        return $arrayLeyenda;
    }

    public function obtenerProductos($id)
    {
        $detalles = DetalleVenta::where('venta_id',$id)->get();
        $arrayProductos = Array();
        foreach($detalles as $detalle){

            $arrayProductos[] = array(
                "codProducto" => 1000 + $detalle->id,
                "unidad" => 'NIU',
                "descripcion"=> $detalle->producto->nombre,
                "cantidad" => (float)$detalle->cantidad,
                "mtoValorUnitario" => (float)($detalle->precio),
                "mtoValorVenta" => (float)($detalle->precio * $detalle->cantidad),
                "mtoBaseIgv" => (float)($detalle->precio * $detalle->cantidad),
                "porcentajeIgv" => 18,
                "igv" => (float)((($detalle->precio * $detalle->cantidad)*1.18) - (($detalle->precio * $detalle->cantidad))),
                "tipAfeIgv" => 10,
                "totalImpuestos" =>  (float)((($detalle->precio * $detalle->cantidad)*1.18) - ($detalle->precio * $detalle->cantidad)),
                "mtoPrecioUnitario" => (float)$detalle->precio

            );
        }

        return $arrayProductos;
    }

    public function obtenerFecha($fecha)
    {
        $date = strtotime($fecha);
        $fecha_emision = date('Y-m-d', $date);
        $hora_emision = date('H:i:s', $date);
        $fecha = $fecha_emision.'T'.$hora_emision.'-05:00';

        return $fecha;
    }

    public function sunat($id)
    {

        try
        {
            $documento = Venta::findOrFail($id);

            if ($documento->sunat != '1') {
                //ARREGLO COMPROBANTE
                $arreglo_comprobante = array(
                    "tipoOperacion" => '0101',
                    "tipoDoc"=> $documento->comprobante->codigo,
                    "serie" => $documento->comprobante->serie,
                    "correlativo" => $documento->id,
                    "fechaEmision" => self::obtenerFecha($documento->venta_date),
                    "fecVencimiento" => self::obtenerFecha($documento->venta_date),
                    "observacion" => 'NN',
                    "formaPago" => array(
                        "moneda" => 'PEN',
                        "tipo" =>  'Contado',
                        "monto" => (float)$documento->total,
                    ),
                    "tipoMoneda" => 'PEN',
                    "client" => array(
                        "tipoDoc" => strlen($documento->cliente->documento) == 8 ? 1 : 6,
                        "numDoc" => $documento->cliente->documento,
                        "rznSocial" => $documento->cliente->nombre,
                        "address" => array(
                            "direccion" => $documento->cliente->direccion,
                        )
                    ),
                    "company" => array(
                        "ruc" =>  '10802398307',
                        "razonSocial" => 'SISCOM FAC',
                        "address" => array(
                            "direccion" => 'AV ESPAÑA 1319',
                        )),
                    "mtoOperGravadas" => (float)$documento->total / 1.18,
                    "mtoOperExoneradas" => 0,
                    "mtoIGV" => (float)($documento->total - ($documento->total / 1.18)),

                    "valorVenta" => (float)$documento->total / 1.18,
                    "totalImpuestos" => (float)($documento->total - ($documento->total / 1.18)),
                    "subTotal" => (float)$documento->total,
                    "mtoImpVenta" => (float)$documento->total,
                    "ublVersion" => "2.1",
                    "details" => self::obtenerProductos($documento->id),
                    "legends" =>  self::obtenerLeyenda($documento),
                );

                //return $arreglo_comprobante;
                //OBTENER JSON DEL COMPROBANTE EL CUAL SE ENVIARA A SUNAT
                $data = enviarComprobanteapi(json_encode($arreglo_comprobante));

                //RESPUESTA DE LA SUNAT EN JSON
                $json_sunat = json_decode($data);

                if ($json_sunat->sunatResponse->success == true) {

                    $documento->sunat = '1';

                    $data_comprobante = generarComprobanteapi(json_encode($arreglo_comprobante));
                    $name = $documento->comprobante->serie."-".$documento->id.'.pdf';

                    if(!file_exists(storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'sunat'))) {
                        mkdir(storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'sunat'));
                    }

                    $pathToFile = storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'sunat'.DIRECTORY_SEPARATOR.$name);

                    file_put_contents($pathToFile, $data_comprobante);

                    $arreglo_qr = array(
                        "ruc" => '10802398307',
                        "tipo" => $documento->comprobante->codigo,
                        "serie" => $documento->comprobante->serie,
                        "numero" => $documento->id,
                        "emision" => self::obtenerFecha($documento->venta_date),
                        "igv" => 18,
                        "total" => (float)$documento->total,
                        "clienteTipo" => strlen($documento->cliente->documento) == 8 ? 1 : 6,
                        "clienteNumero" => $documento->cliente->documento,
                    );

                    /************/
                    $data_qr = generarQrApi(json_encode($arreglo_qr), $documento->empresa_id);

                    $name_qr = $documento->comprobante->serie."-".$documento->id.'.svg';

                    if(!file_exists(storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'qrs'))) {
                        mkdir(storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'qrs'));
                    }

                    $pathToFile_qr = storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'qrs'.DIRECTORY_SEPARATOR.$name_qr);

                    file_put_contents($pathToFile_qr, $data_qr);

                    /************/

                    $data_xml = generarXmlapi(json_encode($arreglo_comprobante), $documento->empresa_id);
                    $name_xml = $documento->comprobante->serie.'-'.$documento->id.'.xml';
                    $pathToFile_xml = storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'xml'.DIRECTORY_SEPARATOR.$name_xml);
                    if(!file_exists(storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'xml'))) {
                        mkdir(storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'xml'));
                    }
                    file_put_contents($pathToFile_xml, $data_xml);

                    /*********** */

                    $documento->hash = $json_sunat->hash;
                    $documento->ruta_pdf = 'public/sunat/'.$name;
                    $documento->ruta_qr = 'public/qrs/'.$name_qr;
                    $documento->update();

                    Session::flash('success','Documento de Venta enviada a Sunat con exito.');

                    $ventas = Venta::with('Cliente','User')->get();

                    return view('admin.venta.index',[

                        'id_sunat' => $json_sunat->sunatResponse->cdrResponse->id,
                        'descripcion_sunat' => $json_sunat->sunatResponse->cdrResponse->description,
                        'notas_sunat' => $json_sunat->sunatResponse->cdrResponse->notes,
                        'sunat_exito' => true,
                        'ventas' => $ventas

                    ])->with('sunat_exito', 'success');

                }else{

                    //COMO SUNAT NO LO ADMITE VUELVE A SER 0
                    $documento->sunat = '0';

                    if ($json_sunat->sunatResponse->error) {
                        $id_sunat = $json_sunat->sunatResponse->error->code;
                        $descripcion_sunat = $json_sunat->sunatResponse->error->message;
                    }else {
                        $id_sunat = $json_sunat->sunatResponse->cdrResponse->id;
                        $descripcion_sunat = $json_sunat->sunatResponse->cdrResponse->description;
                    };

                    $documento->update();

                    Session::flash('error','Documento de Venta sin exito en el envio a sunat.');

                   $ventas = Venta::with('Cliente','User')->get();

                    return view('admin.venta.index',[
                        'id_sunat' =>  $id_sunat,
                        'descripcion_sunat' =>  $descripcion_sunat,
                        'sunat_error' => true,
                        'ventas' => $ventas


                    ])->with('sunat_error', 'error');
                }
            }else{
                $documento->sunat = '1';
                $documento->update();
                Session::flash('error','Documento de venta fue enviado a Sunat.');
                return redirect()->route('ventas.index')->with('sunat_existe', 'error');
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
            $documento = Sale::findOrFail($id);
            $documento->sunat = '0';
            $documento->update();
            Session::flash('error', 'No se puede conectar con el servidor, porfavor intentar nuevamente.'); //$e->getMessage()
            return redirect()->route('ventas.index');
        }

    }
}
