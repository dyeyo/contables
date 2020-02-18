<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Transacciones extends Model
{
    protected $fillable=['anio','mes','dia', 'numero_doc', 'valor_transaccion','codigo_presupuesto_letras',
        'codigo_presupuesto', 'tipoPago','valorBase', 'revelacion', 'tercero_id', 'comprobante_id',
        'tipo_presupuesto_id','plantilla','total_debito','total_credito','diferencia','detalle',
        'fecha_movimiento','tarifa_iva','valor_iva','est_transaccion_id','nombre_plantilla'];

    public function  terceros()
    {
        return $this->belongsTo(Persona::class, 'tercero_id','id');
    }

    public function  estadoTransaccion()
    {
        return $this->belongsTo(Persona::class);
    }

    public function  comprobante()
    {
        return $this->belongsTo(Comprobante::class);
    }

    public function  TipoPresupuesto()
    {
        return $this->belongsTo(TipoPresupuesto::class);
    }

    public function plantilaContable()
    {
        return $this->hasMany(PlantillaContable::class);
    }
}
