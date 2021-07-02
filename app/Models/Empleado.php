<?php

namespace App\Models;
use App\Models\Nomina;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','nombre','telefono','departamento_id','user_id'];

    public function Nominas()
    {
        return $this->hasMany(Nomina::class);
    }
}
