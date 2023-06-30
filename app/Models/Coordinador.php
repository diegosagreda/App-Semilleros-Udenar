<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Semillero;
use App\Models\User;


class Coordinador extends Model
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
}
