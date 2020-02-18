<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoEmpleo extends Model
{
    protected $fillable=['codigo','nombreEmpleo','id_nivelEmpleo'];

       public function terceros()
       {
           return $this->hasMany(Terceros::class);
       }

       public function tipoPersonaE()
       {
           return $this->hasMany(PersonasEmpleados::class);
       }

       public function nivelEmpleo()
       {
           return $this->belongsTo(NivelEmpleo::class);
       }
}

