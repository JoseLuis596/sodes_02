<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteTransportesPorClienteController extends Controller
{
    public function index()
    {
        $datos = DB::select('CALL sp_reporte_transportes_por_cliente()');
        return view('reportes.transportes_por_cliente.index', compact('datos'));
    }

    public function generarPDF()
    {
        $datos = DB::select('CALL sp_reporte_transportes_por_cliente()');
        $pdf = Pdf::loadView('reportes.transportes_por_cliente.pdf', compact('datos'));
        return $pdf->download('transportes_por_cliente.pdf');
    }
}
