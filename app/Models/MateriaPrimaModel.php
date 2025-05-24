<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriaPrimaModel extends Model
{
    protected $table = 'materiaprima';
    protected $primaryKey = 'idMateriaPrima';

    protected $fillable = [
        'nombre',
        'descripcion',
        'unidad',
        'expiracion',
        'stock',
        'idProveedor',
        'idAlmacen'
    ];

    public function proveedor()
    {
        return $this->belongsTo(ProveedorModel::class, 'idProveedor');
    }
    public function almacen()
    {
        return $this->belongsTo(AlmacenModel::class, 'idAlmacen');
    }

}
