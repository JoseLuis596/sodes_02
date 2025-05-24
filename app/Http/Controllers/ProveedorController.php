<?php

namespace App\Http\Controllers;

use App\Models\ProveedorModel;
use App\Models\RolModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    
    public function index()
    {
        $proveedores = ProveedorModel::OrderBy('idProveedor','ASC')->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }


    public function create()
    {
    $proveedores = ProveedorModel::OrderBy('idProveedor','ASC')->paginate(10);
    return view('proveedores.create', compact('proveedores'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'razonSocial' => 'required|string|max:100',
            'nombreCompleto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|email|unique:proveedores,correo',
            'rfc' => 'required|string|max:13|unique:proveedores,rfc',
        ]);
    
        ProveedorModel::create($request->all());
    
        return redirect()->route('proveedores.index')->with('message','Proveedor creado correctamente');
    }
    

    public function show(string $id)
    {
        $proveedor= ProveedorModel::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

  
    public function edit(string $id)
    {
        $proveedor = ProveedorModel::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, string $id)
{
    $proveedor = ProveedorModel::findOrFail($id);

    $request->validate([
        'razonSocial' => 'required|string|max:100',
        'nombreCompleto' => 'required|string|max:255',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|string|max:15',
        'correo' => 'required|email|unique:proveedores,correo,' . $id . ',idProveedor',
        'rfc' => 'required|string|max:13|unique:proveedores,rfc,' . $id . ',idProveedor',
    ]);

    $proveedor->update($request->all());

    return redirect()->route('proveedores.index')->with('message', 'Proveedor actualizado correctamente');
}

    

   
    public function destroy(string $id)
    {
        $proveedor = ProveedorModel::findOrFail($id);

        try {
            $proveedor->delete();
            return redirect()->route('proveedores.index')->with('message', 'Proveedor eliminado correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('proveedores.index')->with('danger', 'No se puede eliminar el proveedor debido a dependencias.');
        }
    }
}
