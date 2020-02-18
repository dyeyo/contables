<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPresupuesto extends Model
{
    protected $fillable = ['nombrePresupuesto'];

    public function tipoPresupuestoComprobante()
    {
        return $this->hasMany(TipoPresupuestoComprobante::class);
    }

    public function transacciones()
    {
        return $this->hasMany(Transacciones::class);
    }


}
