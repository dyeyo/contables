<?php

use Illuminate\Database\Seeder;
use App\ClasePersona;

class TipoPersonaTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClasePersona::create(['nombre'=>'PROVEEDOR']);
        ClasePersona::create(['nombre'=>'CONTRATISTA']);
        ClasePersona::create(['nombre'=>'ESTUDIANTE']);
        ClasePersona::create(['nombre'=>'BANCO']);
        ClasePersona::create(['nombre'=>'FALTANTE']);
    }
}
