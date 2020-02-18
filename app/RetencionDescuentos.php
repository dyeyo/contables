<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetencionDescuentos extends Model
{
    protected $table= "retencion_descuentos";

    protected $fillable = ['anio', 'concepto', 'porcentaje', 'base_inical', 'base_final','monto_minimo', 'iva', 'consumo', 'automatico',
        'tipoRetencion','valor_fijo', 'activo', 'codigo_id', 'puc_id_retencion', 'empresa_id', 'RetoDes','base_calculco','reporte_sia',
        'tarifa_retencion','tercero_id','territorialidad','ingreso','codigoPresupuesto','mecanismo','eliminada'];

    public function pucs()
    {
        return $this->belongsTo(Puc::class);
    }

    public function codigo()
    {
        return $this->belongsTo(CodigoConcepto::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function terceros()
    {
        return $this->belongsTo(Persona::class);
    }

    public function plantilaContable()
    {
        return $this->hasMany(PlantillaContable::class);
    }

    public function debitoCredtoRetencion()
    {
        return $this->hasMany(DebitoCreditoRetenciones::class);
    }
}
