<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $fillable=['nombre'];

    public function tipoCuentas()
    {
        return $this->belongsTo(TipoCuenta::class);
    }


    public function presupusetoGasto()
    {
        return $this->belongsTo(CentroGasto::class);
    }


    public function niff()
    {
        return $this->hasMany(Niff::class);
    }
}
