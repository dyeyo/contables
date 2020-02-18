<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVinculacion extends Model
{

    protected $fillable=['nombreVinculacion'];


    public function tipoPersonaE()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }
}
