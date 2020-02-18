<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamentos';
    protected $fillable=['nameDepartamento','codigo'];

    public function municipios()
    {
        return $this->hasMany(Ciudades::class);
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

    public function departamento()
    {
        return $this->hasMany(Empresa::class);
    }
    public function consorciado()
    {
        return $this->hasMany(ConsorciosUnionesTemporales::class);
    }
}
