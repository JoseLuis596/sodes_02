<?php

namespace App\Http\Controllers;

use App\Models\AlmacenModel;
use App\Models\MateriaPrimaModel;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        $almacenes = AlmacenModel::with('materiasPrimas')->paginate(10);
        return view('almacen.index', compact('almacenes'));
    }

    public function create()
    {
        $materiasPrimas = MateriaPrimaModel::all();
        return view('almacen.create', compact('materiasPrimas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'         => 'required|string|max:100',
            'direccion'      => 'required|string|max:255',
            'capacidad'      => 'required|numeric|min:1',
            'unidad_medida'  => 'required|string|in:unidades,toneladas,cajas,metros,piezas,rollos',
            'materiaprima.*' => 'nullable|exists:materiaprima,idMateriaPrima',
        ]);

        $almacen = AlmacenModel::where('nombre', $data['nombre'])->first();

        if (!$almacen) {
            $almacen = AlmacenModel::create([
                'nombre'        => $data['nombre'],
                'direccion'     => $data['direccion'],
                'capacidad'     => $data['capacidad'],
                'unidad_medida' => $data['unidad_medida'],
            ]);
        }

        if (isset($data['materiaprima'])) {
            $almacen->materiasPrimas()->sync($data['materiaprima']);
        }

        return redirect()->route('almacen.index')
                         ->with('message', 'Almacén creado o actualizado correctamente.');
    }

    public function edit($id)
    {
        $almacen = AlmacenModel::findOrFail($id);
        $materiasPrimas = MateriaPrimaModel::all();
        return view('almacen.edit', compact('almacen', 'materiasPrimas'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'         => 'required|string|max:100',
            'direccion'      => 'required|string|max:255',
            'capacidad'      => 'required|numeric|min:1',
            'unidad_medida'  => 'required|string|in:unidades,toneladas,cajas,metros,piezas,rollos',
            'materiaprima.*' => 'nullable|exists:materiaprima,idMateriaPrima',
        ]);

        $almacen = AlmacenModel::findOrFail($id);
        $almacen->update([
            'nombre'        => $data['nombre'],
            'direccion'     => $data['direccion'],
            'capacidad'     => $data['capacidad'],
            'unidad_medida' => $data['unidad_medida'],
        ]);

        if (isset($data['materiaprima'])) {
            $almacen->materiasPrimas()->sync($data['materiaprima']);
        } else {
            $almacen->materiasPrimas()->sync([]); 
        }

        return redirect()->route('almacen.index')
                         ->with('message', 'Almacén actualizado correctamente.');
    }

    public function destroy($id)
    {
        $almacen = AlmacenModel::findOrFail($id);
        $almacen->materiasPrimas()->detach(); 
        $almacen->delete();

        return redirect()->route('almacen.index')
                         ->with('message', 'Almacén eliminado correctamente.');
    }
}
