<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteProductosPorProveedorController extends Controller
{
    public function index()
    {
        $productos = DB::select('CALL sp_reporte_productos_por_proveedor()');
        return view('reportes.productos_por_proveedor.index', compact('productos'));
    }

    public function generarPDF()
    {
        $productos = DB::select('CALL sp_reporte_productos_por_proveedor()');
        $pdf = Pdf::loadView('reportes.productos_por_proveedor.pdf', compact('productos'));
        return $pdf->download('productos_por_proveedor.pdf');
    }
}
