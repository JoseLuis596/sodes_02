<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PedidoModel;

class ClienteModel extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'idCliente';
    protected $fillable = ['nombre', 'apellidoPaterno', 'apellidoMaterno', 'rfc', 'telefono', 'email', 'direccion'];

    public function pedidos()
    {
        return $this->hasMany(PedidoModel::class, 'idCliente', 'idCliente');
    }


}
