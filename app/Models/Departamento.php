<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','departamento','encargado','telefono'];
    //Tiene muchos empleados 1:m
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
    public function avisos()
    {
        return $this->belongsToMany(Aviso::class);
    }
}
