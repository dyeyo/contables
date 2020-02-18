<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MacroprocesosBancarios extends Model
{
    protected $fillable=['fecha','soporte','codigo_cuenta','documento','tipo','debito','credito','estado','fecha_marca'];
}
