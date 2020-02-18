<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
   protected $fillable=['codigoCC', 'NombreCC', 'NombreCorto', 'claseCC', 'prorrateo', 'nombreGrupoCC', 'vigenciaInicio',
       'vigenciaFin', 'tercero_id', 'puc_id', 'empresa_id','anio'];

   public function terceros()
   {
       return $this->belongsTo(Persona::class);
   }

    public function puc()
    {
        return $this->belongsTo(Puc::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function subSede()
    {
        return $this->hasMany(SubSede::class);
    }

    public function plantillaContable()
    {
        return $this->hasMany(PlantillaContable::class);
    }
}

