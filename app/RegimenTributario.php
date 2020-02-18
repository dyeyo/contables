<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegimenTributario extends Model
{
    protected $fillable=['nombre'];

    public function tipoPersonaJ()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

    public function consorciado()
    {
        return $this->hasMany(EmpresaConsorcios::class);
    }
}
