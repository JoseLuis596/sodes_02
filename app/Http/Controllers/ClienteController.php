<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteModel;
use App\Models\PedidoModel;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = ClienteModel::select('*')->orderBy('idCliente', 'ASC');
        $limit = (isset($request->limit))  ? $request->limit : 9;

        if (isset($request->search)){
            $clientes = $clientes->where('idCliente', 'LIKE', '%'.  $request->search . '%')
                ->orWhere('nombre', 'like', '%'.$request->search.'%')
                ->orWhere('apellidoPaterno', 'like', '%'. $request->search .'%')
                ->orWhere('apellidoMaterno', 'like', '%' .$request->search.'%')
                ->orWhere('rfc', 'like', '%' .$request->search.'%')
                ->orWhere('telefono', 'like', '%' .$request->search.'%')
                ->orWhere('email', 'like', '%' .$request->search.'%')
                ->orWhere('direccion', 'like', '%' .$request->search.'%');
                            
        }
        $clientes = $clientes->paginate($limit)->appends($request->all());       

        return view('clientes.index', compact('clientes'));

    }
    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'rfc' => 'required|string|max:13|unique:clientes,rfc,{$id},idCliente',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|max:100|unique:clientes,email,{$id},idCliente',
            'direccion' => 'required|string|max:255',
        ]);
        
       ClienteModel::create($request->all());
        return redirect()->route('clientes.index')->with('message','Cliente creado correctamente');

    }


public function destroy($id)
    {
        $cliente = ClienteModel::findOrFail($id);

        try {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('message', 'Cliente eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('clientes.index')->with('danger', 'No se puede eliminar el cliente porque tiene registros relacionados.');
        }
    }

    public function exportPDF()
    {
        $clientes = ClienteModel::all();
        $pdf = PDF::loadView('clientes.exportPDF', compact('clientes'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }   

    public function show($id){
        $cliente = ClienteModel::findOrFail($id);
        return view('clientes.show', compact('cliente'));

    }
    public function edit($id){
        $cliente = ClienteModel::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }
    public function update(Request $request, $id){
        $cliente= ClienteModel::findOrFail($id);
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:50',
            'apellidoMaterno' => 'required|string|max:50',
            'rfc' => 'required|string|max:13|unique:clientes,rfc,'. $cliente->idCliente . ',idCliente',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|max:100|unique:clientes,rfc,'. $cliente->idCliente . ',idCliente',
            'direccion' => 'required|string|max:255',
        ]);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('message', 'Cliente Actualizado Correctamente ');
    }

}