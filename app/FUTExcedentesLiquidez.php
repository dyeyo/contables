<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FUTExcedentesLiquidez extends Model
{
    protected $fillable=['abreviatura','conceptoLiquidez'];

    public function puc()
    {
        return $this->hasMany(Puc::class);
    }


}
