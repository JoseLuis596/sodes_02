<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cliente;
use App\Models\ClienteModel;

class ReportePedidosPorClienteController extends Controller
{
    public function create()
    {
        $clientes = ClienteModel::all();
        return view('reportes.pedidos_por_cliente.create', compact('clientes'));
    }

    public function show(Request $request)
    {
        $idCliente = $request->input('idCliente');
        $pedidos = DB::select('CALL sp_reporte_pedidos_por_cliente(?)', [$idCliente]);
        $cliente = ClienteModel::find($idCliente);

        return view('reportes.pedidos_por_cliente.show', compact('pedidos', 'cliente'));
    }

    public function generarPDF($idCliente)
    {
        $pedidos = DB::select('CALL sp_reporte_pedidos_por_cliente(?)', [$idCliente]);
        $cliente = ClienteModel::find($idCliente);

        $pdf = Pdf::loadView('reportes.pedidos_por_cliente.pdf', compact('pedidos', 'cliente'));
        return $pdf->download("pedidos_cliente_{$cliente->nombre}.pdf");
    }
}
