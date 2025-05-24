<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteProduccionDiariaController extends Controller
{
    public function index()
    {
        return view('reportes.produccion_diaria.index');
    }

    public function generar(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
        ]);

        $fecha = $request->input('fecha');
        $datos = DB::select('CALL sp_reporte_produccion_diaria(?)', [$fecha]);

        return view('reportes.produccion_diaria.show', compact('datos', 'fecha'));
    }

    public function generarPDF($fecha)
    {
        $datos = DB::select('CALL sp_reporte_produccion_diaria(?)', [$fecha]);
        $pdf = Pdf::loadView('reportes.produccion_diaria.pdf', compact('datos', 'fecha'));
        return $pdf->download('produccion_diaria_' . $fecha . '.pdf');
    }
}
