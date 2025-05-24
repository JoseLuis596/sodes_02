<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteMovimientosPorFechaController extends Controller
{
    public function create()
    {
        return view('reportes.movimientos_por_fecha.create');
    }

    public function show(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $movimientos = DB::select('CALL sp_reporte_movimientos_por_fecha(?, ?)', [$fechaInicio, $fechaFin]);

        return view('reportes.movimientos_por_fecha.show', compact('movimientos', 'fechaInicio', 'fechaFin'));
    }

    public function generarPDF($fechaInicio, $fechaFin)
    {
        $movimientos = DB::select('CALL sp_reporte_movimientos_por_fecha(?, ?)', [$fechaInicio, $fechaFin]);

        $pdf = Pdf::loadView('reportes.movimientos_por_fecha.pdf', compact('movimientos', 'fechaInicio', 'fechaFin'));
        return $pdf->download("movimientos_{$fechaInicio}_a_{$fechaFin}.pdf");
    }
}
