<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadEjecutara extends Model
{
    protected $fillable=['nombreUnidad'];

    public function tipoPersonaE()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }
}
