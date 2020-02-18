<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasePersona extends Model
{
    protected $table='clase_personas';
    protected $fillable=['nombre'];


    public function tipoPersonaN()
    {
        return $this->hasMany(PersonasNaturales::class);
    }

}
