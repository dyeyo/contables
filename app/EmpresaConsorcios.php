<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaConsorcios extends Model
{
    protected $fillable=['nombre1', 'nombre2', 'apellido', 'apellido2', 'direccion', 'telefono', 'celular',
        'correo', 'pais','nit', 'dv', 'raz_social', 'nomComercial','responsableIVA',
        'regimenSimple', 'autoRetenedor', 'TipocuentaBancaria', 'numeroCuenta', 'estadoCuenta',
        'id_regimenTributario', 'id_actividadesCiiu', 'ciudad_id', 'idDepartamento', 'descritores_id',
        'entidadBancaria_id','anio'];

    public function consorcios()
    {
        return $this->hasMany(ConsoirciosTerceros::class);
    }

    public function actividdesCiiu()
    {
        return $this->belongsTo(CiiuActividades::class);
    }

    public function descrpctoresCiiu()
    {
        return $this->belongsTo(CiiuDescriptores::class);
    }

    public function ciudades()
    {
        return $this->belongsTo(Ciudades::class);
    }

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function entidaBancaria()
    {
        return $this->belongsTo(EntidadBancaria::class);
    }

    public function regiemenTributario()
    {
        return $this->belongsTo(RegimenTributario::class);
    }



}
