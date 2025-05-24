<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorModel extends Model
{
    use HasFactory;

    protected $table='proveedores';
    protected $primaryKey='idProveedor';
    protected $fillable =['razonSocial', 'nombreCompleto', 'direccion','telefono', 'correo','rfc'];
}
