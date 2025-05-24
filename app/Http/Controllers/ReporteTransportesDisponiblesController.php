<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteTransportesDisponiblesController extends Controller
{
    public function index()
    {
        $transportes = DB::select('CALL sp_reporte_transportes_disponibles()');
        return view('reportes.transportes_disponibles.index', compact('transportes'));
    }

    public function generarPDF()
    {
        $transportes = DB::select('CALL sp_reporte_transportes_disponibles()');
        $pdf = Pdf::loadView('reportes.transportes_disponibles.pdf', compact('transportes'));
        return $pdf->download('transportes_disponibles.pdf');
    }
}
