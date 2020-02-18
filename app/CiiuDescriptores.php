<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiiuDescriptores extends Model
{
    protected $fillable=['actividad'];

    public function actividades()
    {
        return $this->hasMany(CiiuActividades::class);
    }

    public function tipoPersonaN()
    {
        return $this->hasMany(PersonasNaturales::class);
    }
    public function consorciado()
    {
        return $this->hasMany(ConsorciosUnionesTemporales::class);
    }
}
