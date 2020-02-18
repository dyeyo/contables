<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table='ciudades';
    protected $fillable=['name','departamento_id'];

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }


    public function tipoPersonaN()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

    public function tipoPersonaJ()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

    public function tipoPersonaE()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }

    public function empresa()
    {
        return $this->hasMany(Empresa::class);
    }

    public function consorciado()
    {
        return $this->hasMany(ConsorciosUnionesTemporales::class);
    }
}
