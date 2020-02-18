<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Scopes\ActiveScope;

class User extends Authenticatable
{
    use Notifiable,ShinobiTrait;

   /* protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }*/


    protected $fillable = [
        'email', 'password','persona_id','nombreCompleto'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
        solo si es clase de persona contratista

     */
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function scopeAnio($query, $year)
    {
        if ($year)
            return $query->where('anio','LIKE',"%anio%");
    }

}
