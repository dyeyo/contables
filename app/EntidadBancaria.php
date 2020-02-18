<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadBancaria extends Model
{

    protected $fillable=['CodigoSuperbancaria', 'DenominacionSocialEntidad',
      'DenominacionAbreviadaEntidad', 'nit'];

    public function personaJ()
    {
        return $this->hasMany(PersonasJuridicas::class,"id","entidadBancaria_id","id_regimenTributario");
    }

    public function personaN()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

    public function personaE()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }
}
