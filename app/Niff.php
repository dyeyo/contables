<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niff extends Model
{
    protected $fillable=['codigoNiff', 'nombreNiff', 'naturalezaCuenta', 'CuentaCoNC', 'cuentaCobrar', 'cuentaPagar',
        'refiereFlujo', 'exigeCentroCostos', 'exigeBase', 'exigeTerceros', 'activa', 'porcentaje','nivel', 'puc_id',
        'conceptoDian_id', 'formatoDian_id', 'tipoCuenta_id','opcionesPrivilegios_id','anio'];

    public function puc()
    {
        return $this->belongsTo(Puc::class,'puc_id','id');
    }

    public function concepto()
    {
        return $this->belongsTo(conceptoDianExogeno::class);
    }

    public function formato()
    {
        return $this->belongsTo(formatoDianExogeno::class);
    }

    public function tipoCuentas()
    {
        return $this->belongsTo(TipoCuenta::class);
    }

    public function pucPrivilegio()
    {
        return $this->belongsTo(PrivilegiosPUC::class);
    }


}
