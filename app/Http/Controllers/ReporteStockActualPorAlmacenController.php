<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteStockActualPorAlmacenController extends Controller
{
    public function index()
    {
        $stock = DB::select('CALL sp_reporte_stock_actual_por_almacen()');
        return view('reportes.stock_por_almacen.index', compact('stock'));
    }

    public function generarPDF()
    {
        $stock = DB::select('CALL sp_reporte_stock_actual_por_almacen()');
        $pdf = Pdf::loadView('reportes.stock_por_almacen.pdf', compact('stock'));
        return $pdf->download('stock_actual_por_almacen.pdf');
    }
}
