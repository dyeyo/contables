<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $fillable=['abreviatura', 'nombreSoporte', 'tesoreria', 'contabilidad', 'naturaleza',
        'activarDescuentos','reporteSIA', 'estado', 'empresa_id', 'tipoPresupuesto_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function tipoPresupuesto()
    {
        return $this->belongsTo(TipoPresupuesto::class);
    }

    public function tipoPresupuestoComprobante()
    {
        return $this->hasMany(TipoPresupuestoComprobante::class);
    }

    public function comprobanteRevelacionTransaccion()
    {
        return $this->hasMany(PlantillaContable::class);
    }


}
