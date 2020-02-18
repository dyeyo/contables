<?php

use Illuminate\Database\Seeder;
use App\RegimenTributario;

class RegimenTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegimenTributario::create(['nombre'=>'GRAN CONTRIBUYENTE']);
        RegimenTributario::create(['nombre'=>'SECTOR PUBLICO']);
        RegimenTributario::create(['nombre'=>'RTE ESAL']);
        RegimenTributario::create(['nombre'=>'SECTOR FINANCIERO']);
        RegimenTributario::create(['nombre'=>'OTRO']);
        RegimenTributario::create(['nombre'=>'FALTANTE']);

    }
}
