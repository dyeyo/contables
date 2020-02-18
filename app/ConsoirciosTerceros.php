<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsoirciosTerceros extends Model
{
    protected $fillable=['persona_id', 'porcentaje','empresa_consorcios_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function empresa()
    {
        return $this->belongsTo(EmpresaConsorcios::class, 'empresa_consorcios_id');
    }

}
