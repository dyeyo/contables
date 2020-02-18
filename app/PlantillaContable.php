<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantillaContable extends Model
{
    protected $fillable=['docReferencia','debito', 'credito', 'nota','base', 'codigoNIIIF','transacciones_id',
        'centro_costo_id','transaccionesDescuento_id','puc_id','tercero_plantilla','fecha_movimiento'
        ,'est_registro_id','valor_retenido'];

    public function transaccion()
    {
        return $this->belongsTo(Transacciones::class, 'transacciones_id');
    }

    public function RetencionDescuento()
    {
        return $this->belongsTo(RetencionDescuentos::class);
    }

    public function terceros()
    {
        return $this->belongsTo(Persona::class);
    }

    public function pucs()
    {
        return $this->belongsTo(Puc::class, 'puc_id');
    }

    public function centroCostos()
    {
        return $this->belongsTo(Sede::class, 'centro_costo_id');
    }

}
