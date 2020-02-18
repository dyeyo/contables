<?php

use Illuminate\Database\Seeder;
use App\CuentaMaesta;

class CuentaMaestraTableSeed extends Seeder
{
    public function run()
    {
        CuentaMaesta::create(['abreviatura'=>'RS','conceptoCuentaMaestra'=>'Régimen Subsidiado']);
        CuentaMaesta::create(['abreviatura'=>'SP','conceptoCuentaMaestra'=>'Salud Pública']);
        CuentaMaesta::create(['abreviatura'=>'OF','conceptoCuentaMaestra'=>'Prestación de servicios']);
        CuentaMaesta::create(['abreviatura'=>'OI','conceptoCuentaMaestra'=>'Otros Gastos de Inversión']);
        CuentaMaesta::create(['abreviatura'=>'OF','conceptoCuentaMaestra'=>'Otros Gastos de Funcionamiento']);
        CuentaMaesta::create(['abreviatura'=>'SB','conceptoCuentaMaestra'=>'Saneamiento Básico']);
        CuentaMaesta::create(['abreviatura'=>'OT','conceptoCuentaMaestra'=>'Otro']);
        CuentaMaesta::create(['abreviatura'=>'FALTANTE','conceptoCuentaMaestra'=>'FALTANTE']);
    }
}
