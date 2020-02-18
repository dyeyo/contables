<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cierres extends Model
{
    protected $fillable=['anio'];

    public function cieresConcepto() :HasMany
    {
        return $this->hasMany(ConceptosCierres::class);
    }
}
