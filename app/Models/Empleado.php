<?php

namespace App\Models;
use App\Models\User;
use App\Models\Nomina;
use App\Models\Departamento;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','nombre','telefono','departamento_id','user_id'];
    //Tiene muchas nominas 1:m
    public function nominas()
    {
        return $this->hasMany(Nomina::class);
    }
    //Tiene un usuario 1:1
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Tiene un departamento m:1
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
