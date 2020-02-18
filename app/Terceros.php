<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terceros extends Model
{
    protected $fillable=['tipoTercero', 'numeroDocumento', 'nombre1', 'nombre2', 'apellido1', 'apellido2',
        'nomComercial', 'esSupervisor', 'nit', 'dv', 'raz_social','celular', 'cod_siu', 'responsableIVA', 'regimenSimple',
        'autoRetenedor', 'designadoSupervisor', 'tipoContratista', 'fec_nacimiento', 'fec_vinculacion', 'genero',
        'direccion', 'telefono', 'correo', 'pais', 'foto', 'apellido1_rl', 'apellido2_rl', 'nombre1_rl', 'nombre2_rl',
        'direccion_rl', 'telefono_rl', 'correo_rl','celular_rl','Subclase','tar_profesional', 'denaminacionEmpleo', 'id_codigoEmpleo',
        'id_dependencia', 'idCiudad', 'idEmpresa', 'id_regimenTributario', 'id_tipoDocumento', 'id_clase',
        'id_tipoVinculacion', 'id_nivelEmpleo', 'id_unidadEjecutara','id_actividadesCiiu','gradoEmpleo'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function ciudades()
    {
        return $this->belongsTo(Ciudades::class);
    }

    public function actividdesCiiu()
    {
        return $this->belongsTo(CiiuActividades::class);
    }

    public function empresas()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function codigoEmpleados()
    {
        return $this->belongsTo(CodigoEmpleo::class);
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function regimenTributario()
    {
        return $this->belongsTo(RegimenTributario::class);
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function clasePersona()
    {
        return $this->belongsTo(ClasePersona::class);
    }

    public function tipoVinculacion()
    {
        return $this->belongsTo(TipoVinculacion::class);
    }

    public function nivelEmpleo()
    {
        return $this->belongsTo(NivelEmpleo::class);
    }

    public function unidadEjecutara()
    {
        return $this->belongsTo(UnidadEjecutara::class);
    }

    public function consorciado()
    {
        return $this->hasMany(ConsorciosUnionesTemporales::class);
    }

}
