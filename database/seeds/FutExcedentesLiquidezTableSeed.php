<?php

use Illuminate\Database\Seeder;
use  App\FUTExcedentesLiquidez;

class FutExcedentesLiquidezTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        FUTExcedentesLiquidez::create(['abreviatura'=>'0','conceptoLiquidez'=>'FALTANTE']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E','conceptoLiquidez'=>'TOTAL']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.1','conceptoLiquidez'=>'RECURSOS LIBRE DESTINACIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.1.1','conceptoLiquidez'=>'SGP PROPÓSITO GENERAL RECURSOS DE LIBRE DESTINACIÓN 42% MUNICIPIOS DE 4, 5 Y 6 CATEGORÍA.']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.1.5','conceptoLiquidez'=>'INGRESOS CORRIENTES DE LIBRE DESTINACIÓN DIFERENTES A LA PARTICIPACIÓN DE LIBRE DESTINACIÓN PROPÓSITO GENERAL']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4','conceptoLiquidez'=>'RECURSOS CON DESTINACIÓN ESPECÍFICA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.1','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - EDUCACIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.11','conceptoLiquidez'=>'S.G.P. POR CRECIMIENTO DE LA ECONOMÍA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.11.1','conceptoLiquidez'=>'PRIMERA INFANCIA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.11.3','conceptoLiquidez'=>'EDUCACIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.13','conceptoLiquidez'=>'SISTEMA GENERAL FORZOSA INVERSIÓN DE PARTICIPACIÓN PROPÓSITO GENERAL']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.13.1','conceptoLiquidez'=>'DEPORTE Y RECREACIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.13.3','conceptoLiquidez'=>'CULTURA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.13.5','conceptoLiquidez'=>'LIBRE INVERSIÓN MENORES DE 25000 HABITANTES']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.13.7','conceptoLiquidez'=>'RESTO LIBRE INVERSIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.3','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - SALUD']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.3.1','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - SALUD: RÉGIMEN SUBSIDIADO']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.3.3','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - SALUD:  PÚBLICA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.3.5','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - SALUD: SERVICIOS A LA POBLACIÓN POBRE NO AFILIADA']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.5','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - ALIMENTACIÓN ESCOLAR']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.7','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - RIBEREÑOS']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.9','conceptoLiquidez'=>'RECURSOS SGP CON DESTINACIÓN ESPECIFICA - AGUA POTABLE Y SANEAMIENTO BÁSICO']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.9.1','conceptoLiquidez'=>'PERTENECIENTES A LA ENTDIAD TERRITORIAL']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.1.9.2','conceptoLiquidez'=>'DE MUNICIPIOS DESCERTIFICADOS']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3','conceptoLiquidez'=>'OTROS RECURSOS DE DESTINACIÓN ESPECÍFICA DIFERENTES AL SGP']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.1','conceptoLiquidez'=>'REGALÍAS Y COMPENSACIONES  (RÉGIMEN ANTERIOR DE REGALÍAS LEY 141/94 Y 756/02)']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.1.1','conceptoLiquidez'=>'REGALÍAS DIRECTAS']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.1.3','conceptoLiquidez'=>'REGALÍAS INDIRECTAS  (RÉGIMEN ANTERIOR DE REGALÍAS LEY 141/94 Y 756/02)']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.3','conceptoLiquidez'=>'RECURSOS DE CONVENIOS Y/O COFINANCIACIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.5','conceptoLiquidez'=>'RECURSOS DEL CRÉDITO']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.6','conceptoLiquidez'=>'OTROS RECURSOS DIFERENTES A LOS ANTERIORES']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.6.1','conceptoLiquidez'=>'CON DESTINACIÓN SECTOR EDUCACIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.6.3','conceptoLiquidez'=>'CON DESTINACIÓN SECTOR SALUD']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.6.5','conceptoLiquidez'=>'CON DESTINACIÓN SECTOR AGUA POTABLE Y SANEAMIENTO BÁSICO']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.6.6','conceptoLiquidez'=>'RECAUDOS A FAVOR DE TERCEROS']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'E.4.3.6.7','conceptoLiquidez'=>'CON DESTINACIÓN A OTROS SECTORES DE INVERSIÓN']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'FVAC','conceptoLiquidez'=>'SE REMITE INFORME VACÍO']);
        FUTExcedentesLiquidez::create(['abreviatura'=>'VAL','conceptoLiquidez'=>'CIFRAS DE CONTROL']);

    }
}
