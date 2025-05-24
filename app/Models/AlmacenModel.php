<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenModel extends Model
{
    use HasFactory;

    protected $table = 'almacen';
    protected $primaryKey = 'idAlmacen';

    protected $fillable = ['direccion', 'nombre', 'capacidad', 'unidad_medida'];

 public function materiasPrimas()
{
    return $this->belongsToMany(
        MateriaPrimaModel::class,
        'almacen_materiaprima',
        'idAlmacen',
        'idMateriaPrima'
    )->withTimestamps();
}

}
