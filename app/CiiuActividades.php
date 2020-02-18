<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CiiuActividades extends Model
{
    protected $fillable=['codigo', 'descripcion', 'descritores_id'];

    public function descriptores()
    {
        return $this->belongsTo(CiiuDescriptores::class);
    }

    public function tipoPersonaN()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

    public function tipoPersonaJ()
    {
        return $this->hasMany(PersonasJuridicas::class);
    }

    public function consorciado()
    {
        return $this->hasMany(ConsorciosUnionesTemporales::class);
    }
}
