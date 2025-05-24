<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteStockEtapaController extends Controller
{
    public function index()
    {
        $datos = DB::select('CALL sp_control_stock_por_etapa()');
        return view('reportes.stock_etapa.index', compact('datos'));
    }

    public function generatePDF()
    {
        $datos = DB::select('CALL sp_control_stock_por_etapa()');
        $pdf = Pdf::loadView('reportes.stock_etapa.pdf', compact('datos'));
        return $pdf->download('reporte_stock_etapa.pdf');
    }
}
