<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    protected $table = 'ingresos';
    protected $primaryKey = 'id_ingreso';
    protected $fillable =
    [
        'fecha_ingreso',
        'descripcion_ingreso',
        'monto_ingreso',
        'tipo_ingreso',
        'metodo_ingreso',
        'estado_ingreso',
    ];
}
