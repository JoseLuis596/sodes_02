<?php

namespace App\Http\Controllers;

use App\Models\MateriaPrimaModel;
use App\Models\ProveedorModel;
use App\Models\AlmacenModel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class MateriaPrimaController extends Controller
{
   

  public function index()
    {
        $materiasPrimas = MateriaPrimaModel::with('proveedor', 'almacen')->paginate(10);
        return view('materiasPrimas.index', compact('materiasPrimas'));
      
    }

    public function create()
    {
        $proveedores = ProveedorModel::all();
        $almacen = AlmacenModel::all();
        return view('materiasPrimas.create', compact('proveedores', 'almacen'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string',
        'unidad' => 'required|string|max:50',
        'expiracion' => 'nullable|date',
        'idProveedor' => 'required|exists:proveedores,idProveedor',
        'almacenes' => 'required|array|min:1',
        'almacenes.*.id' => 'required|exists:almacen,idAlmacen',
        'almacenes.*.cantidad' => 'required|numeric|min:0',
    ]);

    try {
        DB::beginTransaction();

        $materiaPrima = MateriaPrimaModel::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'unidad' => $request->unidad,
            'expiracion' => $request->expiracion,
            'idProveedor' => $request->idProveedor,
            'stock' => 0 // se calcula después
        ]);

        $stockTotal = 0;

        // Relacionar con almacenes
        foreach ($request->almacenes as $almacen) {
            $materiaPrima->almacenes()->attach($almacen['id'], ['cantidad' => $almacen['cantidad']]);
            $stockTotal += $almacen['cantidad'];
        }

        // Actualizar el stock total
        $materiaPrima->stock = $stockTotal;
        $materiaPrima->save();

        DB::commit();

        return redirect()->route('materiasPrimas.index')->with('success', 'Materia prima registrada correctamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('danger', 'Error al registrar: ' . $e->getMessage());
    }
}

    public function show(string $id)
    {
        $materiaPrima = MateriaPrimaModel::with('proveedor', 'almacen') // Carga el proveedor y almacén
            ->findOrFail($id);

        return view('materiasPrimas.show', compact('materiaPrima'));
    }

   public function edit($id)
{
    
        $proveedores = ProveedorModel::all();
        $almacen = AlmacenModel::all();
    $materiaPrima = MateriaPrimaModel::findOrFail($id);
    return view('materiasPrimas.edit', compact('materiaPrima', 'proveedores','almacen'));
}


    public function update(Request $request, string $id)
    {
        $materiaPrima = MateriaPrimaModel::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:70',
            'descripcion' => 'required|string',
            'unidad' => 'required|string|max:50',
            'expiracion' => 'nullable|date',
            'stock' => 'required|integer|min:0',
            'idAlmacen' => 'required|exists:almacen,idAlmacen', // Validación para idAlmacen
            'idProveedor' => 'required|exists:proveedores,idProveedor', // Validación para idProveedor
        ]);

        try {
            $materiaPrima->update($request->all());

            return redirect()->route('materiasPrimas.index')->with('message', "Actualizado correctamente");
        } catch (QueryException $e) {
            return redirect()->route('materiasPrimas.index')->with('danger', 'Hubo un error al actualizar el registro');
        }
    }

    public function destroy(string $id)
    {
        $materiaPrima = MateriaPrimaModel::findOrFail($id);

        try {
            $materiaPrima->delete(); // Eliminar la materia prima
            return redirect()->route('materiasPrimas.index')->with('message', 'Registro eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('materiasPrimas.index')->with('danger', 'No se pudo eliminar el registro');
        }
    }

   
}
