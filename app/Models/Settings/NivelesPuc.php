<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class NivelesPuc extends Model
{
    public $table = "public.niveles_puc";
    protected $fillable=[
        'nom_nivel',
        'cantidad_digitos',
        'total_digitos',
        'created_at',
        'updated_at'
        ];

    


}
