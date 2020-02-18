<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoConcepto extends Model
{

    protected $fillable=['codigo'];

    public function descuentos()
    {
        return $this->hasMany(RetencionDescuentos::class);
    }
}
