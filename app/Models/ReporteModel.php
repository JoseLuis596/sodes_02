<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteModel extends Model
{
    protected $table = 'reportes';
    protected $primaryKey = 'idReporte';

    protected $fillable = [
        'nombre',
        'tipo',
        'fechaGenerado',
        'idUsuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
