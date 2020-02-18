<?php

use Illuminate\Database\Seeder;
use App\TipoCuenta;

class TipoCuentaTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCuenta::create(['nombre' => 'Superior']);
        TipoCuenta::create(['nombre' => 'Detalle']);
    }
}
