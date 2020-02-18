<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable=['nombre1', 'nombre2', 'apellido', 'apellido2','raz_social',
        'direccion', 'telefono', 'celular', 'correo', 'pais','foto',
        'responsableIVA', 'regimenSimple','natural_id','juridica_id','empleado_id','pesonaNatural','anio'];

    public function natural()
    {
        return $this->belongsTo(PersonasNaturales::class);
    }

    public function juridica()
    {
        return $this->belongsTo(PersonasJuridicas::class,'juridica_id','id');
    }

    public function empleado()
    {
        return $this->belongsTo(PersonasEmpleados::class,'empleado_id','id');
    }

    public function consoircios()
    {
        return $this->hasMany(ConsoirciosTerceros::class);
    }

    public function sede()
    {
        return $this->hasMany(Sede::class);
    }

    public function subSede()
    {
        return $this->hasMany(SubSede::class);
    }

    public function transaccion()
    {
        return $this->hasMany(Transacciones::class);
    }

    public function dependencia()
    {
        return $this->hasMany(Dependencia::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function retencion()
    {
        return $this->hasMany(RetencionDescuentos::class);
    }

    public function platillas()
    {
        return $this->hasMany(PlantillaContable::class);
    }
}
