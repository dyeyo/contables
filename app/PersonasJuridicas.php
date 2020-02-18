<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\IsTrue;

class PersonasJuridicas extends Model
{

    protected $fillable=['nit', 'dv', 'nomComercial', 'autoRetenedor', 'TipocuentaBancaria',
        'numeroCuenta', 'estadoCuenta', 'id_regimenTributario', 'id_actividadesCiiu', 'ciudad_id',
        'idDepartamento', 'descritores_id', 'entidadBancaria_id','tipoPersona','banco'];

    public function personaJuridica()
    {
        return $this->hasMany(Persona::class);
    }

    public function entidades()
    {
        return $this->belongsTo(EntidadBancaria::class, "entidadBancaria_id","id");
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

    public function regimenTributario()
    {
        return $this->belongsTo(RegimenTributario::class, "id_regimenTributario","id");
    }

    public function consorciosTercero()
    {
        return $this->hasMany(ConsoirciosTerceros::class);
    }

    public function consorciosJuridica()
    {
        return $this->belongsToMany(ConsoirciosTerceros::class);
    }

    public function puc()
    {
        return $this->hasMany(Puc::class);
    }

}
