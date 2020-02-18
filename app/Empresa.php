<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected  $table="empresas";

    protected $fillable=['nombre', 'nit', 'dig_verificacion', 'codCgn', 'marco_normativo','direccion',
       'telefono', 'correo', 'url', 'lema', 'logo_republica', 'logo_municipio', 'logo_plandesarrollo',
       'num_ingresoinicial', 'num_ingresoactual', 'vigencia_cdp', 'id_ciudad','id_departamento',
        'nombreContador', 'cedulaContador', 'noTpContador', 'nombreRevisorFiscal', 'cedulaRevisorFiscal',
        'noTPRevisorFiscal', 'nombreControlInterno', 'cedulaControlInterno', 'noTPControlInterno', 'jefePresupuesto',
        'cedulaJefePresupuesto', 'noTPJefePresupuesto', 'otroResponsable', 'nombreOtroResponsable',
        'cedulaJefePresupuesto', 'noTPOtroResponsable'];

    public function ciudades()
    {
       return $this->belongsTo(Ciudades::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function empleado()
    {
       return $this->hasMany(PersonasEmpleados::class);
    }

    public function dependeciasEmpleado()
    {
        return $this->hasMany(Dependencia::class);
    }

    public function puc()
    {
        return $this->hasMany(Puc::class);
    }

    public function sede()
    {
        return $this->hasMany(Sede::class);
    }

    public function retencionDescuentos()
    {
        return $this->hasMany(RetencionDescuentos::class);
    }


    public function comrobante()
    {
        return $this->hasMany(Comprobante::class);
    }

/*    public function panelControl()
    {
        return $this->hasMany(PanelControl::class);
    }*/

}
