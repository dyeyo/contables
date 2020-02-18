<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelEmpleo extends Model
{
    protected $fillable=['nombre'];


    public function tipoPersonaE()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }

    public function codigoEmplep()
    {
        return $this->hasMany(CodigoEmpleo::class);
    }
}
