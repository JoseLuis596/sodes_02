<?php

namespace App\Http\Controllers;

use App\Models\MovimientoModel;
use App\Models\AlmacenModel;
use App\Models\MateriaPrimaModel;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = MovimientoModel::with(['materiaPrima', 'almacen', 'users'])
            ->orderBy('idMovimiento', 'ASC')
            ->paginate(10);

        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $materiasPrimas = MateriaPrimaModel::all();
        $almacen = AlmacenModel::all();
        $users = User::all();
        $tiposMovimiento = ['entrada', 'salida'];

        return view('movimientos.create', compact('materiasPrimas', 'almacen', 'users', 'tiposMovimiento'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipoMovimiento' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1',
            'fechaMovimiento' => 'required|date',
            'idMateriaPrima' => 'required|exists:materiaprima,idMateriaPrima',
            'idAlmacen' => 'required|exists:almacen,idAlmacen',
            'idUsuario' => 'required|exists:users,id',
        ]);

        $materia = MateriaPrimaModel::findOrFail($request->idMateriaPrima);

        if ($request->tipoMovimiento === 'salida' && $materia->stock < $request->cantidad) {
            return back()->with('danger', 'Stock insuficiente para realizar la salida.');
        }

        DB::beginTransaction();
        try {
            $movimiento = MovimientoModel::create($request->all());

            if ($request->tipoMovimiento === 'entrada') {
                $materia->stock += $request->cantidad;
            } else {
                $materia->stock -= $request->cantidad;
            }

            $materia->save();
            DB::commit();

            return redirect()->route('movimientos.index')->with('success', 'Movimiento creado correctamente.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('danger', 'Error al registrar el movimiento: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $movimiento = MovimientoModel::with(['materiaPrima', 'almacen', 'users'])->findOrFail($id);
        return view('movimientos.show', compact('movimiento'));
    }

    public function edit($id)
    {
        $movimiento = MovimientoModel::findOrFail($id);
        $materiasPrimas = MateriaPrimaModel::all();
        $almacen = AlmacenModel::all();
        $users = User::all();
        $tiposMovimiento = ['entrada', 'salida'];

        return view('movimientos.edit', compact('movimiento', 'materiasPrimas', 'almacen', 'users', 'tiposMovimiento'));
    }

    public function update(Request $request, $id)
    {
        $movimiento = MovimientoModel::findOrFail($id);

        $request->validate([
            'tipoMovimiento' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1',
            'fechaMovimiento' => 'required|date',
            'idMateriaPrima' => 'required|exists:materiaprima,idMateriaPrima',
            'idAlmacen' => 'required|exists:almacen,idAlmacen',
            'idUsuario' => 'required|exists:users,id',
        ]);

        $materia = MateriaPrimaModel::findOrFail($request->idMateriaPrima);

        DB::beginTransaction();
        try {
            // Revertir stock anterior
            if ($movimiento->tipoMovimiento === 'entrada') {
                $materia->stock -= $movimiento->cantidad;
            } else {
                $materia->stock += $movimiento->cantidad;
            }

            // Validar stock nuevo
            if ($request->tipoMovimiento === 'salida' && $materia->stock < $request->cantidad) {
                DB::rollBack();
                return back()->with('danger', 'Stock insuficiente para realizar la salida.');
            }

            // Aplicar nuevo stock
            if ($request->tipoMovimiento === 'entrada') {
                $materia->stock += $request->cantidad;
            } else {
                $materia->stock -= $request->cantidad;
            }

            $materia->save();
            $movimiento->update($request->all());

            DB::commit();
            return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado correctamente.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('danger', 'Error al actualizar el movimiento: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $movimiento = MovimientoModel::findOrFail($id);

        DB::beginTransaction();
        try {
            $materia = MateriaPrimaModel::findOrFail($movimiento->idMateriaPrima);

            if ($movimiento->tipoMovimiento === 'entrada') {
                $materia->stock -= $movimiento->cantidad;
            } else {
                $materia->stock += $movimiento->cantidad;
            }

            $materia->save();
            $movimiento->delete();

            DB::commit();
            return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado correctamente.');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('movimientos.index')->with('danger', 'No se puede eliminar el movimiento debido a dependencias.');
        }
    }
}
