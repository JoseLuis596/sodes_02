<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClienteModel;

class PedidoModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPedido';
    protected $table = 'pedidos';

    protected $fillable = [
        'idCliente',
        'fechaPedido',
        'estado',
        'total',

    ];

    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'idCliente', 'idCliente');
    }
}
