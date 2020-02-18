<?php

use Illuminate\Database\Seeder;
use App\FuentesFinancierasSIA;
class fuentes_financieras_SIATableSeed extends Seeder
{

    public function run()
    {
        FuentesFinancierasSIA::create(['abreviatura'=>'FF1','concepto'=>'para Recursos Propios']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF2','concepto'=>'SGP Sector Educación']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF3','concepto'=>'SGP Sector Salud']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF4','concepto'=>'SGP Agua Potable y Saneamiento Básico']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF5','concepto'=>'SGP Recreación y Deporte']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF6','concepto'=>'SGP Cultura']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF7','concepto'=>'Convenios']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF8','concepto'=>'Asignaciones Especiales']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF9','concepto'=>'Créditos']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF10','concepto'=>'Otros']);
        FuentesFinancierasSIA::create(['abreviatura'=>'FF11','concepto'=>'Regalías']);
        FuentesFinancierasSIA::create(['abreviatura'=>'0000','concepto'=>'FALTANTE']);
    }
}
