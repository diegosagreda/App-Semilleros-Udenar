<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'codProyecto';
    protected $fillable = [
        // Otros campos permitidos para asignación masiva
        'numero_integrantes',
    ];
    public $timestamps = true;
    
}
