<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','remitente','documento'];
    
    
    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
}
