<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientosContables extends Model
{
   protected $fillable=['plantilla_contable_id','transaccion_id','puc_id','est_registro_id',
       'valor_credito','valor_retenido','valor_base','retencion_descuento_id','centro_costo_id','fecha_movimiento'];
}
