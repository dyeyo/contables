<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbitosyBienes extends Model
{
   protected $fillable=['nombreBien'];

   public function dependecias()
   {
       return $this->hasMany(Dependencia::class);
   }
}
