<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coordinador;

class Semillero extends Model
{
    use HasFactory;

    protected $guarded= [];
    public function coordinador()
    {
        return $this->hasOne(Coordinador::class);
    }

}
