<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $clientes = Cliente::get();
        return view('admin.cliente.index',compact('clientes'));
    }

    
    public function create()
    {
        return view('admin.cliente.create');
    }

    public function Store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {

            Cliente::create($request->all());
            DB::commit();
            return redirect()->route('clientes.index')->with('Clienteg','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('clientes.create')->with('Clienteg','error');
        }
        
    }

  
    public function show(Cliente $cliente)
    {

    }

    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('admin.cliente.edit')->with('cliente',$cliente);
    }


    public function Update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $cliente=Cliente::find($id);
            $cliente->update($request->all());
            DB::commit();
            return redirect()->route('clientes.index')->with('Clientee','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('clientes.edit')->with('Clientee','error');
        }
        
    }

   
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $cliente=Cliente::find($id);
            $cliente->delete();
            DB::commit();
            return redirect()->route('clientes.index')->with('Cliented','ok');
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return redirect()->route('clientes.index')->with('Cliented','error');
        }
        
    }

    public function buscarDni(Request $request)
    {
        $dni=$request->get('dni');
        $data = file_get_contents("https://dniruc.apisperu.com/api/v1/dni/".$dni."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImZhYnJpY2lvLmhlcm5hbmRlejE5OTlAZ21haWwuY29tIn0.rcgEZat72pYO8E9Un_qy_ri1S9aHrR1nuiBvuz0Zo3s");
        $info = json_decode($data,true);
        if($data==='')
        {
            $datos = array(0 => 'nada');
        }else{
             $datos = array(
                0 => $info['dni'],
                1 => $info['nombres'],
                2 => $info['apellidoPaterno'],
                3 => $info['apellidoMaterno'],
            ); 
        }

        return json_encode($datos);
    }

     public function buscarRuc(Request $request)
    {
        $dni=$request->get('dni');
        $data = file_get_contents("https://dniruc.apisperu.com/api/v1/ruc/".$dni."?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImZhYnJpY2lvLmhlcm5hbmRlejE5OTlAZ21haWwuY29tIn0.rcgEZat72pYO8E9Un_qy_ri1S9aHrR1nuiBvuz0Zo3s");
        $info = json_decode($data,true);
        if($data==='')
        {
            $datos = array(0 => 'nada');
        }else{
             $datos = array(
                0 => $info['ruc'],
                1 => $info['razonSocial'],
            ); 
        }

        return json_encode($datos);
    }
}
