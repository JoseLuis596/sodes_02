<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use Illuminate\Http\Request;
use App\Models\TransporteModel;

use Illuminate\Database\QueryException;

class TransporteController extends Controller
{
    public function index()
    {
        $transportes = TransporteModel::with('cliente')->orderBy('idTransporte', 'ASC')->paginate(10);
        return view('transportes.index', compact('transportes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:70',
            'modelo' => 'required|string|max:70',
            'anio' => 'required|integer|min:1900|max:'.(date('Y')),
            'capacidad' => 'required|integer|min:1',
            'idCliente' => 'required|exists:clientes,idCliente', 
        ]);

        TransporteModel::create($request->all());
        return redirect()->route('transportes.index')->with('message', "Se realizó el registro correctamente");
    }

    public function show(string $id)
    {
        $transporte = TransporteModel::with('cliente')->findOrFail($id);
        return view('transportes.show', compact('transporte'));
    }

    public function edit(string $id)
    {
        $transporte = TransporteModel::findOrFail($id);
        $clientes = ClienteModel::orderBy('nombre', 'ASC')->get();
        return view('transportes.edit', compact('transporte', 'clientes'));

    }

    public function update(Request $request, string $id)
    {
        $transporte = TransporteModel::findOrFail($id);
        $request->validate([
            'marca' => 'required|string|max:70',
            'modelo' => 'required|string|max:70',
            'anio' => 'required|integer|min:1900|max:'.(date('Y')),
            'capacidad' => 'required|integer|min:1',
            'idCliente' => 'required|exists:clientes,idCliente', 
        ]);

        
        $transporte->update($request->all());
        return redirect()->route('transportes.index')->with('message', "Actualizado correctamente");
    }

    public function destroy(string $id)
    {
        
        $transporte = TransporteModel::findOrFail($id);
        try {
            $transporte->delete();
            return redirect()->route('transportes.index')->with('message', 'Registro eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('transportes.index')->with('danger', 'No se pudo eliminar el registro');
        }
    }
    public function create()
    {
        $clientes = ClienteModel::orderBy('nombre', 'ASC')->get();

        return view('transportes.create', compact('clientes'));
    }

}
