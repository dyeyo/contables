<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable=['codigo','nombre','persona_id','anio'];

    public function tercero()
    {
        return $this->belongsTo(Persona::class);
    }

    public function empleados()
    {
        return $this->hasMany(PersonasEmpleados::class);
    }

    public function naturales()
    {
        return $this->hasMany(PersonasNaturales::class);
    }



}
