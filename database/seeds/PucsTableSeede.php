<?php

use Illuminate\Database\Seeder;
use App\Puc;

class PucsTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puc::create(['codigoCuenta'=>'0000','nombreCuenta'=>'0000']);
    }
}
