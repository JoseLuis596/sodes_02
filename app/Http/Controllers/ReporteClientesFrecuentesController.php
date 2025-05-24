<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteClientesFrecuentesController extends Controller
{
    public function index()
    {
        $clientes = DB::select('CALL sp_reporte_clientes_frecuentes()');
        return view('reportes.clientes_frecuentes.index', compact('clientes'));
    }

    public function generarPDF()
    {
        $clientes = DB::select('CALL sp_reporte_clientes_frecuentes()');
        $pdf = Pdf::loadView('reportes.clientes_frecuentes.pdf', compact('clientes'));
        return $pdf->download('clientes_frecuentes.pdf');
    }
}
