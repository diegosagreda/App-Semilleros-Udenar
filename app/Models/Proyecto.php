<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semillerista;
use App\Models\Evento;


class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'codProyecto';
    protected $fillable = [
        // Otros campos permitidos para asignación masiva
        'numero_integrantes',
    ];
    public $timestamps = true;


     /**Relacion muchos a muchos con semilleristas*/
     public function semilleristas (){
      return $this->belongsToMany(Semillerista::class);
    }

     /**Relacion muchos a muchos con eventos*/
     public function eventos (){
      return $this->belongsToMany(Evento::class);
    }
    public function scopeTipo($query, $tipo){

        if($tipo)
            return $query->where('tipoProyecto','LIKE',"%$tipo%");
    }
    public function scopeFecha($query, $fecha){

        if($fecha)
            return $query->where('fecha_inicioPro','LIKE',"%$fecha%");
    }
    public function scopeEstado($query, $estado){

        if($estado)
            return $query->where('estProyecto','LIKE',"%$estado%");
    }

    public function semillero()
    {
        return $this->belongsTo(Semillero::class);
    }

}
