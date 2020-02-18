<?php

use Illuminate\Database\Seeder;
use App\UnidadEjecutara;

class UnidadEjectuoraTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadEjecutara::create(['id' => '999', 'nombreUnidad' => 'SELECCIONE UNA OPCION']);
    }
}
