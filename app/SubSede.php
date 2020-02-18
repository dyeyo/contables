<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSede extends Model
{
    protected $fillable=['codigoCC', 'NombreCC', 'NombreCorto', 'claseCC', 'prorrateo', 'nombreGrupoCC', 'vigenciaInicio',
        'vigenciaFin', 'tercero_id', 'puc_id', 'sede_id','anio'];

    public function terceros()
    {
        return $this->belongsTo(Persona::class);
    }

    public function puc()
    {
        return $this->belongsTo(Puc::class);
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

}
