<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DebitoCreditoRetenciones extends Model
{
    protected $table="debito_credito_retenciones";

    protected $fillable=['debito','credito','puc_id','retencion_descuentos_id'];

    public function puc()
    {
        return $this->belongsTo(Puc::class);
    }

    public function retencion()
    {
        return $this->belongsTo(RetencionDescuentos::class);
    }
}
