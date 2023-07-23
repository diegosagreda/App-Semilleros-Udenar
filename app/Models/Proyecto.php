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
    public $timestamps = true;


     /**Relacion muchos a muchos con semilleristas*/
     public function semilleristas (){
      return $this->belongsToMany(Semillerista::class);
    }

     /**Relacion muchos a muchos con eventos*/
     public function eventos (){
      return $this->belongsToMany(Evento::class);
    }
}
