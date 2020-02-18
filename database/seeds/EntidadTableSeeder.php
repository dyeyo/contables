<?php

use Illuminate\Database\Seeder;
use App\EntidadBancaria;
class EntidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'0000',
            'DenominacionSocialEntidad'=>'FALTANTE',
            'DenominacionAbreviadaEntidad'=>'FALTANTE',
            'nit'=>'00000-0'
        ]);

        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'1',
            'DenominacionSocialEntidad'=>'Banco de Bogotá',
            'DenominacionAbreviadaEntidad'=>'Banco de Bogotá',
            'nit'=>'860002964-4'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'2',
            'DenominacionSocialEntidad'=>'Banco Popular S.A.',
            'DenominacionAbreviadaEntidad'=>'Banco Popular',
            'nit'=>'860007738-9'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'6',
            'DenominacionSocialEntidad'=>'ITAÚ CORPBANCA COLOMBIA S.A. podrá utilizar cualquiera de las siguientes siglas ITAÚ; BANCO CORPBANCA; o CORPBANCA',
            'DenominacionAbreviadaEntidad'=>'Sigla: Banco CorpBanca',
            'nit'=>'890903937-0'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'7',
            'DenominacionSocialEntidad'=>'Bancolombia S.A. o Banco de Colombia S.A. o Bancolombia',
            'DenominacionAbreviadaEntidad'=>'Bancolombia',
            'nit'=>'890903938-8'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'9',
            'DenominacionSocialEntidad'=>'Citibank-Colombia -  Expresión Citibank',
            'DenominacionAbreviadaEntidad'=>'Citibank',
            'nit'=>'860051135-4'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'12',
            'DenominacionSocialEntidad'=>'BANCO GNB SUDAMERIS S.A.  Quien podrá utilizar el nombre BANCO GNB SUDAMERIS o SUDAMERIS, seguidos o no de las expresiones sociedad anónima o la sigla S.A.',
            'DenominacionAbreviadaEntidad'=>'Banco GNB Sudameris',
            'nit'=>'860050750-1'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'13',
            'DenominacionSocialEntidad'=>'Banco Bilbao Vizcaya Argentaria Colombia S.A. podrá utilizar el nombre BBVA Colombia',
            'DenominacionAbreviadaEntidad'=>'BBVA Colombia',
            'nit'=>'860003020-1'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'23',
            'DenominacionSocialEntidad'=>'Banco  de  Occidente S.A.',
            'DenominacionAbreviadaEntidad'=>'Banco de Occidente',
            'nit'=>'890300279-4'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'30',
            'DenominacionSocialEntidad'=>'BANCO CAJA SOCIAL S.A.  y podrá usar el nombre BANCO CAJA SOCIAL ',
            'DenominacionAbreviadaEntidad'=>'BANCO CAJA SOCIAL S.A.',
            'nit'=>'860007335-4'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'39',
            'DenominacionSocialEntidad'=>'Banco Davivienda S.A. "Banco Davivienda" o "Davivienda"',
            'DenominacionAbreviadaEntidad'=>'Davivienda',
            'nit'=>'860034313-7'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'42',
            'DenominacionSocialEntidad'=>'"SCOTIABANK COLPATRIA S.A." y podrá utilizar cualquiera de los siguientes nombres abreviados o siglas: "BANCO COLPATRIA", "SCOTIABANK", "SCOTIABANK COLPATRIA", "COLPATRIA SCOTIABANK",  "COLPATRIA MULTIBANCA", "MULTIBANCA COLPATRIA"',
            'DenominacionAbreviadaEntidad'=>'BANCO COLPATRIA',
            'nit'=>'860034594-1'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'43',
            'DenominacionSocialEntidad'=>'Banco Agrario de Colombia S.A. -Banagrario-',
            'DenominacionAbreviadaEntidad'=>'Banagrario',
            'nit'=>'800037800-8'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'49',
            'DenominacionSocialEntidad'=>'Banco Comercial AV Villas S.A. Podrá girar bajo la denominación Banco de Ahorro y Vivienda AV Villas, Banco AV Villas o AV Villas.',
            'DenominacionAbreviadaEntidad'=>'AV Villas',
            'nit'=>'860035827-5'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'51',
            'DenominacionSocialEntidad'=>'Banco ProCredit Colombia S.A. siglas "BPCC", "PROCREDIT" o "BANCO PROCREDIT"',
            'DenominacionAbreviadaEntidad'=>'Procredit',
            'nit'=>'900200960-9'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'52',
            'DenominacionSocialEntidad'=>'Banco de las Microfinanzas -Bancamía S.A.',
            'DenominacionAbreviadaEntidad'=>'Bancamía S.A.',
            'nit'=>'900215071-1'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'53',
            'DenominacionSocialEntidad'=>'Banco W S.A.',
            'DenominacionAbreviadaEntidad'=>'BANCO W S.A.',
            'nit'=>'900378212-2'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'54',
            'DenominacionSocialEntidad'=>'Banco Coomeva S.A.  - Sigla "BANCOOMEVA"',
            'DenominacionAbreviadaEntidad'=>'Bancoomeva',
            'nit'=>'900406150-5'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'55',
            'DenominacionSocialEntidad'=>'Banco Finandina S.A. o Finandina Establecimiento Bancario. Sigla: FINANDINA',
            'DenominacionAbreviadaEntidad'=>'Finandina',
            'nit'=>'860051894-6'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'56',
            'DenominacionSocialEntidad'=>'Banco Falabella S.A.',
            'DenominacionAbreviadaEntidad'=>'Banco Falabella S.A.',
            'nit'=>'900047981-8'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'57',
            'DenominacionSocialEntidad'=>'Banco Pichincha S.A.',
            'DenominacionAbreviadaEntidad'=>'Banco Pichincha S.A.',
            'nit'=>'890200756-7'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'58',
            'DenominacionSocialEntidad'=>'El Banco Cooperativo Coopcentral  Sigla: COOPCENTRAL',
            'DenominacionAbreviadaEntidad'=>'Coopcentral',
            'nit'=>'890203088-9'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'59',
            'DenominacionSocialEntidad'=>'BANCO SANTANDER DE NEGOCIOS COLOMBIA S. A Siglas o nonmbres: Banco Santander o Santander',
            'DenominacionAbreviadaEntidad'=>'Siglas o nombres: Banco Santander o Santander',
            'nit'=>'900628110-3'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'60',
            'DenominacionSocialEntidad'=>'"BANCO MUNDO MUJER S.A."  Denominación de "MUNDO MUJER EL BANCO DE LA COMUNIDAD" o "MUNDO MUJER" ',
            'DenominacionAbreviadaEntidad'=>'MUNDO MUJER EL BANCO DE LA COMUNIDAD" o "MUNDO MUJER',
            'nit'=>'900768933-8'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'61',
            'DenominacionSocialEntidad'=>'"BANCO MULTIBANK S.A.  Sigla: "MULTIBANK S.A." o "MULTIBANK"',
            'DenominacionAbreviadaEntidad'=>'MULTIBANK S.A." o "MULTIBANK',
            'nit'=>'860024414-1'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'62',
            'DenominacionSocialEntidad'=>'BANCO COMPARTIR S.A. Sigla: "BANCOMPARTIR S.A."',
            'DenominacionAbreviadaEntidad'=>'BANCOMPARTIR S.A.',
            'nit'=>'860025971-5'
        ]);
        EntidadBancaria::create([
            'CodigoSuperbancaria'=>'63',
            'DenominacionSocialEntidad'=>'BANCO SERFINANZA S.A., podrá girar también con la denominación social BANCO SERFINANZA',
            'DenominacionAbreviadaEntidad'=>'BANCO SERFINANZA',
            'nit'=>'860043186-6'
        ]);
    }
}
