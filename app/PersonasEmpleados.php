<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonasEmpleados extends Model
{
    protected $fillable=['numeroDocumento', 'gradoEmpleo', 'designadoSupervisor', 'fec_nacimiento',
        'fec_vinculacion', 'tipoDocumento_id', 'tipoVinculacion_id', 'ciudad_id',
        'depatamento_id', 'nivelEmpleo_id','genero', 'codigoEmpleo_id', 'unidadEjecutara_id',
        'dependencia_id', 'empresa_id','ordenadorGasto', 'actoAdministrativo', 'fechaExpedicion', 'numeroActo',
        'fechaInicioAutorizacion', 'fechaFinAutorizacion', 'fechaRevocatoria', 'codigoPresupuestoDesde', 'codigoPresupuestoHasta',
        'ambitosBienesServicios', 'todoAbmitos', 'cuantiaHasta', 'estado', 'id_ambitoBienesyServicios',
        'tipoPersona','TipocuentaBancaria', 'numeroCuenta', 'estadoCuenta','entidadBancaria_id',
        'dependencia_id'
    ];

    public function tipoDoc()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function ciudades()
    {
        return $this->belongsTo(Ciudades::class);
    }

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function tipoVinculacion()
    {
        return $this->belongsTo(TipoVinculacion::class);
    }

    public function nivelEmpelo()
    {
        return $this->belongsTo(NivelEmpleo::class, "nivelEmpleo_id","id");
    }

    public function codigoEmpleo()
    {
        return $this->belongsTo(CodigoEmpleo::class, "codigoEmpleo_id","id");
    }

    public function dependecia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function dependeciasEmpleado()
    {
        return $this->hasMany(Dependencia::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function ambitosBienes()
    {
        return $this->belongsTo(AmbitosyBienes::class);
    }

    public function entidades()
    {
        return $this->belongsTo(EntidadBancaria::class);
    }

    public function dependecias()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }
}
