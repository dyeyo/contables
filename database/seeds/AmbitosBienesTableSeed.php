<?php

use Illuminate\Database\Seeder;
use App\AmbitosyBienes;

class AmbitosBienesTableSeed extends Seeder
{
    public function run()
    {
        AmbitosyBienes::create(['nombreBien'=>'SELECCIONE UNA OPCION']);
    }
}
