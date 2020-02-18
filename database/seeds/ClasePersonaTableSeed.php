<?php

use Illuminate\Database\Seeder;
use App\ClasePersona;

class ClasePersonaTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClasePersona::create(['nombre'=>'FALTANTE']);

    }
}
