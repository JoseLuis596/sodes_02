<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransporteModel extends Model
{
    protected $table = 'transportes';  
    protected $primaryKey = 'idTransporte';  
    protected $fillable = ['marca', 'modelo', 'anio', 'capacidad', 'idCliente']; 

    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'idCliente');
    }
}
