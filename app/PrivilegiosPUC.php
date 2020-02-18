<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivilegiosPUC extends Model
{
    protected $table = 'privilegios_p_u_cs';

    protected $fillable=['nombrePrivilegio'];

    public function puc()
    {
        return $this->hasMany(Puc::class);
    }


    public function niff()
    {
        return $this->hasMany(Niff::class);
    }
}
