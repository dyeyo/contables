<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formatoDianExogeno extends Model
{
    protected $fillable=['formato', 'version', 'nombreFormatoDian'];

    public function conceptp()
    {
        return $this->hasMany(conceptoDianExogeno::class);
    }

    public function puc()
    {
        return $this->hasMany(Puc::class);
    }

    public function niff()
    {
        return $this->hasMany(Niff::class);
    }
}
