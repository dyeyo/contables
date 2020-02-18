<?php

use Illuminate\Database\Seeder;
use App\formatoDianExogeno;

class FormatoDianTableSeed extends Seeder
{

    public function run()
    {
        formatoDianExogeno::create(['formato'=>'Formato 1001R', 'version'=>'Versión 10 ', 'nombreFormatoDian'=>'Pagos o abonos en cuenta y retenciones en la fuente practicadas -Impuesto De Renta']);
        formatoDianExogeno::create(['formato'=>'Formato 1001T', 'version'=>'Versión 10 ', 'nombreFormatoDian'=>'Pagos o abonos en cuenta y retenciones en la fuente practicadas-Impuesto De Timbre']);
        formatoDianExogeno::create(['formato'=>'Formato 1003', 'version'=>'Versión 7', 'nombreFormatoDian'=>'Retenciones en la fuente que le practicaron']);
        formatoDianExogeno::create(['formato'=>'Formato 1007', 'version'=>'Versión 9', 'nombreFormatoDian'=>'Ingresos recibidos en el año']);
        formatoDianExogeno::create(['formato'=>'Formato 1008', 'version'=>'Versión 7', 'nombreFormatoDian'=>'Saldo de los créditos activos']);
        formatoDianExogeno::create(['formato'=>'Formato 1009', 'version'=>'Versión 7', 'nombreFormatoDian'=>'Saldo de los pasivos']);
        formatoDianExogeno::create(['formato'=>'Formato 2276', 'version'=>'Versión 2', 'nombreFormatoDian'=>'INFORMACIÓN DE INGRESOS Y RETENCIONES POR RENTAS DE TRABAJO Y DE PENSIONES']);
        formatoDianExogeno::create(['formato'=>'0000', 'version'=>'0000', 'nombreFormatoDian'=>'FALTANTE']);
    }
}
