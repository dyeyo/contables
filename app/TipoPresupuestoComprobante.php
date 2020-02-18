<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPresupuestoComprobante extends Model
{
    protected $fillable = ['comprobante_id','tipoPresupuesto_id'];

    public function comprobante()
    {
        return $this->belongsTo(Comprobante::class, 'comprobante_id');
    }

    public function tipoPresupuesto()
    {
        return $this->belongsTo(TipoPresupuesto::class, 'tipoPresupuesto_id');
    }
}
