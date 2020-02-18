<?php

use Illuminate\Database\Seeder;
use App\CodigoEntidadFinancierasSIA;


class CodigoEntidadFinancieraSIATableSeed extends Seeder
{
    public function run()
    {
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B1','concepto'=>'Banco de Occidente digite ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B2','concepto'=>'Banco de Colombia ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B3','concepto'=>'Banco Popular ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B4','concepto'=>'Banco Agrario ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B5','concepto'=>'Banco de Bogota ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B6','concepto'=>'Davivienda ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B7','concepto'=>'Colmena ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B8','concepto'=>'Av Villas ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B9','concepto'=>'Banco Caja Social ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B10','concepto'=>'Banco Santander ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B11','concepto'=>'Colpatria ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B12','concepto'=>'BBVA ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B13','concepto'=>'Lloyds TSB Bank ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B14','concepto'=>'Megabanco']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B15','concepto'=>'Citibank ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B16','concepto'=>'Boston Bank ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B17','concepto'=>'Banco Unión ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B18','concepto'=>'Banco Tequendama ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B19','concepto'=>'Banco Superior ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B20','concepto'=>'Banco Sudameris ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B21','concepto'=>'Banco Mercantil ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B22','concepto'=>'Banco de Crédito ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B23','concepto'=>'Banco HSBC ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B24','concepto'=>'Coomeva Financiera ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B25','concepto'=>'Cofinal ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B26','concepto'=>'Cooacremat ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B27','concepto'=>'Finamerica ']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'B28','concepto'=>'Otros']);
        CodigoEntidadFinancierasSIA::create(['abreviatura'=>'0000','concepto'=>'FALTANTE']);
    }
}
