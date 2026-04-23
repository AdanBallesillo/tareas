<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_limite',
        'importancia',
        'prioridad',
        'completada',
    ];
    public function calcularPrioridad()
{
    $dias = now()->diffInDays($this->fecha_limite, false);

    if ($dias <= 1) $urgencia = 5;
    elseif ($dias <= 3) $urgencia = 4;
    elseif ($dias <= 7) $urgencia = 3;
    else $urgencia = 2;

    return ($urgencia + $this->importancia) / max($dias, 1);
}
}

