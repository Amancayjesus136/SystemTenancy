<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $table = 'gastos';
    protected $primaryKey = 'id_gasto';
    protected $fillable =
    [
        'fecha_gasto',
        'descripcion_gasto',
        'monto_gasto',
        'tipo_gasto',
        'metodo_gasto',
        'estado_gasto',
    ];
}
