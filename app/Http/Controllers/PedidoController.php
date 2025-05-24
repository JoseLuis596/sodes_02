<?php

namespace App\Http\Controllers;

use App\Models\AlmacenModel;
use App\Models\PedidoModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
 
    public function index(Request $request)
    {
        $almacenes = PedidoModel::orderBy('idPedidos', 'ASC')->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

   
    public function create()
    {
        return view('pedidos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion'=> 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);
        AlmacenModel::create($request->all());
        return redirect()->route('almacen.index')->with('message','Almacen creado correctamente');
    }

    public function show($id)
    {
        $almacen = AlmacenModel::findOrFail($id);
        return view('almacen.show', compact('almacen'));
    }

    
    public function edit($id)
    {
     $almacen = AlmacenModel::findOrFail($id);
     return view('almacen.edit', compact('almacen'));  
    }

    
    public function update(Request $request,$id)
    {
        $almacen = AlmacenModel::findOrFail($id);
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion'=> 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);
        $almacen->update($request->all());
        return redirect()->route('almacen.index')->with('Almacen actualizado correctamente');
    }


    public function destroy($id)
    {
        $almacen = AlmacenModel::findOrFail($id);
        
        try {
            $almacen->delete();
            return redirect()->route('almacen.index')->with('message', 'Almacen eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('almacen.index')->with('danger', 'No se puede eliminar el Almacen porque tiene registros relacionados.');
        }
    }
}
