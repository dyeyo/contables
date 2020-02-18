<?php

use Illuminate\Database\Seeder;
use App\CodigoConcepto;

class codigoConceptoTableSeed extends Seeder
{

    public function run()
    {
        CodigoConcepto::create(['codigo'=>'1']);
        CodigoConcepto::create(['codigo'=>'2']);
        CodigoConcepto::create(['codigo'=>'3']);
        CodigoConcepto::create(['codigo'=>'4']);
        CodigoConcepto::create(['codigo'=>'5']);
        CodigoConcepto::create(['codigo'=>'6']);
        CodigoConcepto::create(['codigo'=>'7']);
        CodigoConcepto::create(['codigo'=>'8']);
        CodigoConcepto::create(['codigo'=>'9']);
        CodigoConcepto::create(['codigo'=>'10']);
        CodigoConcepto::create(['codigo'=>'11']);
        CodigoConcepto::create(['codigo'=>'12']);

    }
}
