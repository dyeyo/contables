<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoEntidadFinancierasSIA extends Model
{

    protected  $table="codigo_entidad_financieras_s_i_as";
    protected $fillable=['abreviatura','concepto'];


    public function puc()
    {
        return $this->hasMany(Puc::class);
    }



}

