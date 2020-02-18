<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuentesFinancierasSIA extends Model
{

    protected $table = 'fuentes_financieras_s_i_as';

    protected $fillable=['abreviatura','concepto'];


    public function puc()
    {
        return $this->hasMany(Puc::class);
    }



}
