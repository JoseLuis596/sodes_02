<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoModel extends Model
{
    protected $table = 'movimientos';
    protected $primaryKey = 'idMovimiento';
    protected $fillable = ['idMateriaPrima', 'idAlmacen', 'tipoMovimiento', 'cantidad', 'fechaMovimiento', 'idUsuario'];

    public function materiaPrima()
    {
        return $this->belongsTo(MateriaPrimaModel::class, 'idMateriaPrima');
    }

    public function almacen()
    {
        return $this->belongsTo(AlmacenModel::class, 'idAlmacen');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
