<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semillero;
use App\Models\User;
use App\Models\Proyecto;

class Semillerista extends Model
{
    use HasFactory;
    protected $primaryKey = 'identificacion';

    protected $guarded= [];


    public function semillero(){
        return $this->BelongsTo(Semillero::class);
    }
    public function usuario(){
        return $this->BelongsTo(User::class);
    }

    /**Relacion muchos a muchos con proyectos*/
    public function proyectos (){
      return $this->belongsToMany(Proyecto::class);
    }
}
