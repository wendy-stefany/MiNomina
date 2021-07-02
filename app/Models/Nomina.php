<?php

namespace App\Models;
use App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;
     protected $fillable = ['semana','empleado_id','percepcion','deduccion','documento','timestamps' => 'datetime:Y-m-d' ,];

     public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
