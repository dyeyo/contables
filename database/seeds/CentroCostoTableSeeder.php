<?php

use Illuminate\Database\Seeder;
use App\Sede;

class CentroCostoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create(['codigoCC'=>'9999', 'NombreCC'=>'9999', 'NombreCorto'=>'9999', 'claseCC'=>'9999', 'prorrateo'=>'9999',
            'nombreGrupoCC'=>'999']);
    }
}
