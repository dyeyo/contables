<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $fillable=['codigo','nombreDocumento'];

    public function tipoPersonaN()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

    public function tipoPersonaE()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }
}
