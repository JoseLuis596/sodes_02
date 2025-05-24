<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReporteModel;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ReporteController extends Controller
{
    // Mostrar lista paginada de reportes
    public function index()
    {
        $reportes = ReporteModel::with('usuario')
            ->orderBy('fechaGenerado', 'desc')
            ->paginate(10);
        return view('reportes.index', compact('reportes'));
    }

    // Formulario para generar reporte manualmente
    public function create()
    {
        return view('reportes.generate');
    }

    // Guardar nuevo reporte generado manualmente
    public function store(Request $request)
    {
        
        $request->validate([
            'tipo' => 'required|string|max:255',
        ]);

        switch ($request->tipo) {
            case 'Control Stock Etapa':
                $datos = DB::select('CALL sp_control_stock_por_etapa()');
                break;
            case 'Producción Diaria':
                $datos = DB::select('CALL sp_reporte_produccion_diaria()');
                break;
            case 'Clientes Frecuentes':
                $datos = DB::select('CALL sp_reporte_clientes_frecuentes()');
                break;
            case 'Pedidos por Cliente':
                $datos = DB::select('CALL sp_reporte_pedidos_por_cliente()');
                break;
            case 'Movimientos por Fecha':
                $datos = DB::select('CALL sp_reporte_movimientos_por_fecha()');
                break;
            case 'Stock por Almacén':
                $datos = DB::select('CALL sp_reporte_stock_actual_por_almacen()');
                break;
            case 'Productos por Proveedor':
                $datos = DB::select('CALL sp_reporte_productos_por_proveedor()');
                break;
            case 'Transportes Disponibles':
                $datos = DB::select('CALL sp_reporte_transportes_disponibles()');
                break;
            case 'Transportes por Cliente':
                $datos = DB::select('CALL sp_reporte_transportes_por_cliente()');
                break;
            default:
                return back()->with('error', 'Tipo de reporte no válido.');
        }

        // Generar PDF
        $pdf = Pdf::loadView('reportes.pdf', [
            'data' => $datos,
            'titulo' => $request->tipo
        ]);

        // Guardar archivo
        $nombreArchivo = 'reporte_' . time() . '.pdf';
        Storage::disk('public')->put('reportes/' . $nombreArchivo, $pdf->output());

        // Guardar en base de datos
        $reporte = new ReporteModel();
        $reporte->nombre = 'Reporte generado manualmente';
        $reporte->tipo = $request->tipo;
        $reporte->fechaGenerado = now();
        $reporte->archivo_pdf = $nombreArchivo;
        $reporte->idUsuario = auth()->users()->id;
        $reporte->save();

        return redirect()->route('reportes.index')->with('success', 'Reporte generado correctamente.');
    }

    // Mostrar vista por tipo de reporte
    public function controlStockEtapa()
    {
        $reportes = DB::select('CALL sp_control_stock_por_etapa()');
        return view('reportes.controlstocketapa.index', compact('reportes'));
    }

    public function produccionDiaria()
    {
        $reportes = DB::select('CALL sp_reporte_produccion_diaria()');
        return view('reportes.producciondiaria.index', compact('reportes'));
    }

    public function clientesFrecuentes()
    {
        $reportes = DB::select('CALL sp_reporte_clientes_frecuentes()');
        return view('reportes.clientesfrecuentes.index', compact('reportes'));
    }

    public function pedidosPorCliente()
    {
        $reportes = DB::select('CALL sp_reporte_pedidos_por_cliente()');
        return view('reportes.pedidosporcliente.index', compact('reportes'));
    }

    public function movimientosPorFecha()
    {
        $reportes = DB::select('CALL sp_reporte_movimientos_por_fecha()');
        return view('reportes.movimientosporfecha.index', compact('reportes'));
    }

    public function stockPorAlmacen()
    {
        $reportes = DB::select('CALL sp_reporte_stock_actual_por_almacen()');
        return view('reportes.stockporalmacen.index', compact('reportes'));
    }

    public function productosPorProveedor()
    {
        $reportes = DB::select('CALL sp_reporte_productos_por_proveedor()');
        return view('reportes.productosporproveedor.index', compact('reportes'));
    }

    public function transportesDisponibles()
    {
        $reportes = DB::select('CALL sp_reporte_transportes_disponibles()');
        return view('reportes.transportesdisponibles.index', compact('reportes'));
    }

    public function transportesPorCliente()
    {
        $reportes = DB::select('CALL sp_reporte_transportes_por_cliente()');
        return view('reportes.transportesporcliente.index', compact('reportes'));
    }

    // Descargar PDF del reporte
    public function generarPdf($id)
    {
        $reporte = ReporteModel::findOrFail($id);

        switch ($reporte->tipo) {
            case 'Control Stock Etapa':
                $data = DB::select('CALL sp_control_stock_por_etapa()');
                break;
            case 'Producción Diaria':
                $data = DB::select('CALL sp_reporte_produccion_diaria()');
                break;
            case 'Clientes Frecuentes':
                $data = DB::select('CALL sp_reporte_clientes_frecuentes()');
                break;
            case 'Pedidos por Cliente':
                $data = DB::select('CALL sp_reporte_pedidos_por_cliente()');
                break;
            case 'Movimientos por Fecha':
                $data = DB::select('CALL sp_reporte_movimientos_por_fecha()');
                break;
            case 'Stock por Almacén':
                $data = DB::select('CALL sp_reporte_stock_actual_por_almacen()');
                break;
            case 'Productos por Proveedor':
                $data = DB::select('CALL sp_reporte_productos_por_proveedor()');
                break;
            case 'Transportes Disponibles':
                $data = DB::select('CALL sp_reporte_transportes_disponibles()');
                break;
            case 'Transportes por Cliente':
                $data = DB::select('CALL sp_reporte_transportes_por_cliente()');
                break;
            default:
                return redirect()->route('reportes.index')->with('error', 'Tipo de reporte no válido');
        }

        $pdf = Pdf::loadView('reportes.pdf', [
            'data' => $data,
            'titulo' => $reporte->tipo
        ]);

        return $pdf->download('reporte_' . str_replace(' ', '_', strtolower($reporte->tipo)) . '.pdf');
    }

    // Mostrar detalle de un reporte
    public function show($id)
    {
        $reporte = ReporteModel::with('usuario')->findOrFail($id);
        return view('reportes.show', compact('reporte'));
    }

    // Eliminar reporte y archivo
    public function destroy($id)
    {
        $reporte = ReporteModel::find($id);

        if (!$reporte) {
            return redirect()->route('reportes.index')->with('error', 'Reporte no encontrado.');
        }

        $archivo = public_path('storage/reportes/' . $reporte->archivo_pdf);
        if (file_exists($archivo)) {
            unlink($archivo);
        }

        $reporte->delete();

        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado correctamente.');
    }
}
