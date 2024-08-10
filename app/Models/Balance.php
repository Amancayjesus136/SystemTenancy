<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;
    protected $table = 'balances';
    protected $primaryKey = 'id_balance';
    protected $fillable =
    [
        'ingreso_total_balance',
        'gasto_total_balance',
        'balance_total',
        'estado_balance',
    ];
}
