<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class  Puc extends Model
{
    protected $table = 'pucs';

    protected $fillable=['codigo_cuenta', 'codigo_superior', 'nombre_cuenta', 'tipoCuenta_id',
        'naturaleza', 'cuenta_co_nc', 'cuentaCobrar', 'cuentaPagar','cuentaMaestraSalud',
        'refiereFlujo', 'exigeTerceros', 'exigeCentroCostos','exigeBase', 'activa','anio',
        'formatoDian_id', 'conceptoDian_id','opciones_privilegios_id','numeroCuenta', 'descripcion',
        'tipoCuentaBancaria', 'situacionFondos', 'usocuentaBancaria', 'posicionClasificadorPresupuestalGastos',
        'posicionClasificadorPresupuestalIngresos', 'codigoInterno', 'codigoSucursal', 'fuentefinanciacionSIA_id',
        'codigoEntidadFinancieraSIA_id', 'cuentaMaestra_id','nivel','porcentaje', 'futExcedentesLiquidez_id',
        'persona_id','id_puc_superior'];

    public function cuentas()
    {
        return $this->hasMany(Puc::class,'codigo_superior','codigo_cuenta');
    }

    public function formato()
    {
        return $this->belongsTo(formatoDianExogeno::class);
    }

    public function tipoCuentas()
    {
        return $this->belongsTo(TipoCuenta::class);
    }

    public function concepto()
    {
        return $this->belongsTo(conceptoDianExogeno::class);
    }

    public function pucPrivilegio()
    {
        return $this->belongsTo(PrivilegiosPUC::class);
    }

    public function funtesSIA(){
        return $this->belongsTo(FuentesFinancierasSIA::class);
    }

    public function codigoSIA(){
        return $this->belongsTo(CodigoEntidadFinancierasSIA::class);
    }

    public function cuentaMaesta(){
        return $this->belongsTo(CuentaMaesta::class);
    }

    public function furExcedente(){
        return $this->belongsTo(FUTExcedentesLiquidez::class);
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function persona(){
        return $this->belongsTo(PersonasJuridicas::class);
    }

    public function sede()
    {
        return $this->hasMany(Sede::class);
    }

    public function subSede()
    {
        return $this->hasMany(SubSede::class);
    }

    public function niff()
    {
        return $this->hasMany(Niff::class);
    }

    public function plantillaContable()
    {
        return $this->hasMany(PlantillaContable::class);
    }

    public function cierre() :HasMany
    {
        return $this->hasMany(Cierres::class);
    }

    public function debitoCredtoRetencion() :HasMany
    {
        return $this->hasMany(DebitoCreditoRetenciones::class);
    }

    public function  retenciones(){
        return $this->hasMany(RetencionDescuentos::class);
    }
}