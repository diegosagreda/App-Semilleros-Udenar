<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $primaryKey = 'codigo';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'modalidad',
        'tipo',
        'lugar',
        'clasificacion',
        'fecha_inicio',
        'fecha_fin',
        'observaciones',
    ];
}