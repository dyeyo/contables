<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonasNaturales extends Model
{

    protected $fillable=['numeroDocumento', 'Subclase', 'designadoSupervisor', 'TipocuentaBancaria',
        'numeroCuenta', 'estadoCuenta', 'tipoPersona', 'id_tipoDocumento', 'id_clase', 'id_actividadesCiiu',
        'descritores_id', 'ciudad_id', 'idDepartamento', 'entidadBancaria_id', 'dependencia_id'
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class,'natural_id');
        //Recuerda que la llave foranea la tiene persona
        //Dejame ver la BD, prueba nuevamente

    }
    public function actividdesCiiu()
    {
        return $this->belongsTo(CiiuActividades::class);
    }

    public function descripcionCiiu()
    {
        return $this->belongsTo(CiiuDescriptores::class);
    }

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

    public function clasePersona()
    {
        return $this->belongsTo(ClasePersona::class);
    }

    public function dependecia()
    {
        return $this->belongsTo(Dependencia::class);
    }

    public function consorciosNaturales()
    {
        return $this->belongsTo(ConsoirciosTerceros::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function entidades()
    {
        return $this->belongsTo(EntidadBancaria::class);
    }



}
