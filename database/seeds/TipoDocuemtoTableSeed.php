<?php

use Illuminate\Database\Seeder;
use App\TipoDocumento;

class TipoDocuemtoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::create(['nombreDocumento'=>'CEDULA ','codigo'=>13]);
        TipoDocumento::create(['nombreDocumento'=>'TARJETA DE IDENTIDAD','codigo'=>12]);
        TipoDocumento::create(['nombreDocumento'=>'TARJETA DE EXTRANGERIA','codigo'=>21]);
    }
}
