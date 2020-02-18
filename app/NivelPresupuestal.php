<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelPresupuestal extends Model
{
    protected $table='nivel_presupuestal';

    protected $fillable=['nivel','numero_caracteres'];

    public function presupuestoGasto()
    {
        return $this->hasMany(CentroGasto::class);
    }

    protected $dateFormat = 'Y-m-d H:i:sP';
}
