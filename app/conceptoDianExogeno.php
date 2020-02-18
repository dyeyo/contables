<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conceptoDianExogeno extends Model
{
    protected $fillable=['codigo','concepto','formato_id'];

    public function formato()
    {
        return $this->belongsTo(formatoDianExogeno::class);
    }

    public function formatoPuc()
    {
        return $this->hasMany(puc::class);
    }

    public function conceptoPuc()
    {
        return $this->hasMany(puc::class);
    }


    public function niff()
    {
        return $this->hasMany(Niff::class);
    }
}
