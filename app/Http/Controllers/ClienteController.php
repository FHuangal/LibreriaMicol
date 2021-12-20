<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;

class ClienteController extends Controller
{
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
        Cliente::create($request->all());

        return redirect()->route('clientes.index');
    }

  
    public function show(Cliente $cliente)
    {
        return view('admin.cliente.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('admin.cliente.edit')->with('cliente',$cliente);
    }


    public function Update(UpdateRequest $request, $id)
    {
        $cliente=Cliente::find($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

   
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
