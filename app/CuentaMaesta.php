<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaMaesta extends Model
{
    protected $fillable = ['abreviatura', 'conceptoCuentaMaestra'];

    public function puc()
    {
        return $this->hasMany(Puc::class);
    }

}
