<?php

use Illuminate\Database\Seeder;
use App\conceptoDianExogeno;

class ConceptoDianTableSeed extends Seeder
{

    public function run()
    {
        conceptoDianExogeno::create([
            'codigo'=>5055,
            'concepto'=>'Viáticos: El valor acumulado efectivamente pagado que no constituye ingreso para el trabajador, en el concepto 5055.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5056,
            'concepto'=>'Gastos de representación: El valor acumulado efectivamente pagado que no constituye ingreso para el trabajador, en el concepto 5056.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5002,
            'concepto'=>'Honorarios de renta no laboral: El valor acumulado pagado o abonado en cuenta, en el concepto 5002.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5003,
            'concepto'=>'Comisiones de renta no laboral: El valor acumulado pagado o abonado en cuenta, en el concepto 5003.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5004,
            'concepto'=>'Servicios de renta no laboral: El valor acumulado pagado o abonado en cuenta, en el concepto 5004',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5005,
            'concepto'=>'Arrendamientos: El valor acumulado pagado o abonado en cuenta, en el concepto5005',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5006,
            'concepto'=>'Intereses y rendimientos financieros: El valor acumulado pagado o abonado en cuenta, en el concepto 5006.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5007,
            'concepto'=>'Compra de activos movibles (E.T. Artículo 60): El valor acumulado pagado o abonado en cuenta, en el concepto 5007.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5008,
            'concepto'=>'Compra de activos fijos (E.T. Artículo 60): El valor acumulado pagado o abonado en cuenta, en el concepto 5008.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5010,
            'concepto'=>'Los pagos o abonos en cuenta por concepto de aportes parafiscales al Sena, a las Cajas de Compensación Familiar y al Instituto Colombiano de Bienestar Familiar, en el concepto 5010.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5011,
            'concepto'=>'Los pagos o abonos en cuenta por concepto de aportes a las empresas promotoras de salud EPS y los aportes al Sistema de Riesgos Laborales, incluidos los aportes del trabajador, en el concepto 5011.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5012,
            'concepto'=>'Los pagos o abonos en cuenta por concepto de aportes obligatorios para pensiones efectuados a los Fondos de Pensiones, incluidos los aportes del trabajador, en el concepto 5012.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5013,
            'concepto'=>'Las donaciones en dinero efectuadas a las entidades señaladas en los artículos125, 125-4, 126-2 y 158-1 del Estatuto Tributario y la establecida en el artículo 16de la Ley 814 de 2003, y demás que determine la ley, en el concepto 5013.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5014,
            'concepto'=>'Las donaciones en activos diferentes a dinero efectuadas a las entidades señaladas en los artículos 125, 125-4, 126-2, 126-5 y 158-1 del Estatuto Tributario y la establecida en el artículo 16 de la Ley 814 de 2003, y demás que determine la ley, en el concepto 5014.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5015,
            'concepto'=>'El valor de los impuestos solicitados como deducción, en el concepto 5015.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5066,
            'concepto'=>'El valor del impuesto al consumo solicitado como deducción, en el concepto 5066',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5058,
            'concepto'=>'El valor de los aportes, tasas y contribuciones solicitado como deducción, en el concepto 5058.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5060,
            'concepto'=>'Redención de inversiones en lo que corresponde al reembolso del capital, en el concepto 5060.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5016,
            'concepto'=>'Los demás costos y deducciones, en el concepto 5016.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5008,
            'concepto'=>'Compra de activos fijos reales productivos sobre los cuales solicitó deducción, artículo 158-3 E.T. El valor acumulado pagado o abonado en cuenta, en el concepto 5020. Este valor no debe incluirse en el concepto 5008.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5027,
            'concepto'=>'El valor acumulado de los pagos o abonos en cuenta al exterior por servicios técnicos, en el concepto 5027.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5023,
            'concepto'=>'El valor acumulado de los pagos o abonos en cuenta al exterior por asistencia técnica, en el concepto5023.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5067,
            'concepto'=>'  El valor acumulado de los pagos o abonos en cuenta al exterior por consultoría, en el concepto 5067.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5024,
            'concepto'=>'  El valor acumulado de los pagos o abonos en cuenta al exterior por marcas, en el concepto 5024.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5025,
            'concepto'=>'  El valor acumulado de los pagos o abonos en cuenta al exterior por patentes, en el concepto 5025.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5026,
            'concepto'=>'  El valor acumulado de los pagos o abonos en cuenta al exterior por regalías, en el concepto 5026.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5028,
            'concepto'=>'  El valor acumulado de la devolución de pagos o abonos en cuenta y retenciones correspondientes a operaciones de años anteriores debe reportarse en el concepto 5028.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5029,
            'concepto'=>'  Gastos pagados por anticipado por Compras: El valor acumulado pagado o abonado en cuenta se debe reportar en el concepto 5029.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5030,
            'concepto'=>'  Gastos pagados por anticipado por honorarios de renta no laboral: El valor acumulado pagado o abonado en cuenta se debe reportar en elconcepto5030',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5031,
            'concepto'=>'  Gastos pagados por anticipado por comisiones de renta no laboral: El valor acumulado pagado o abonado en cuenta se debe reportar en elconcepto5031',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5032,
            'concepto'=>'  Gastos pagados por anticipado por servicios de renta no laboral: El valor acumulado pagado o abonado en cuenta se debe reportar en elconcepto5032',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5033,
            'concepto'=>'  Gastos pagados por anticipado por arrendamientos: El valor acumulado pagado o abonado en cuenta se debe reportar en el concepto 5033.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5034,
            'concepto'=>'  Gastos pagados por anticipado por intereses y rendimientos financieros: El valor acumulado pagado o abonado en cuenta se debe reportaren el concepto 5034.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5035,
            'concepto'=>'  Gastos pagados por anticipado por otros conceptos: El valor acumulado pagado o abonado en cuenta se debe reportar en el concepto 5035.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5019,
            'concepto'=>'  El monto de las amortizaciones realizadas se debe reportar en el concepto 5019.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5034,
            'concepto'=>'  El valor de las participaciones o dividendos pagados o abonados en cuenta en calidad de exigibles, en el concepto 5043.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5044,
            'concepto'=>'  El pago por loterías, rifas, apuestas y similares, en el concepto 5044.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5045,
            'concepto'=>'  Retención sobre ingresos de tarjetas débito y crédito, en el concepto 5045.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5046,
            'concepto'=>'  Enajenación de activos fijos de personas naturales ante oficinas de tránsito y otras entidades autorizadas, en el concepto 5046.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5059,
            'concepto'=>'El pago o abono en cuenta realizado a cada uno de los cooperados, del valor del fondo de protección de aportes creado con el remanente, en el concepto 5059',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5061,
            'concepto'=>'Las utilidades pagadas o abonadas en cuenta, cuando el beneficiario es diferente al fideicomitente, se informará en el Formato 1014 en el concepto 5061.',
            'formato_id'=>1]);
        conceptoDianExogeno::create([
            'codigo'=>5063,
            'concepto'=>'Intereses y rendimientos financieros pagados: El valor pagado, en el concepto 5063.',
            'formato_id'=>1]);

        conceptoDianExogeno::create(['codigo'=>5053, 'concepto'=>' Retenciones practicadas a título de timbre, en el concepto 5053.','formato_id'=>2]);
        conceptoDianExogeno::create(['codigo'=>5054, 'concepto'=>'La devolución de retenciones a título de impuesto de timbre, correspondientes a operaciones de años anteriores, en el concepto 5054.','formato_id'=>2]);

        conceptoDianExogeno::create([
            'codigo'=>1301,
            'concepto'=>'Retención por salarios prestaciones y demás pagos laborales, en el concepto 1301.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1302,
            'concepto'=>'Retención por ventas, en el concepto 1302.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1303,
            'concepto'=>'Retención por servicios, en el concepto 1303.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1304,
            'concepto'=>'Retención por honorarios, en el concepto 1304.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1305,
            'concepto'=>'Retención por comisiones, en el concepto 1305.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1306,
            'concepto'=>'Retención por intereses y rendimientos financieros, en el concepto 1306.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1307,
            'concepto'=>'Retención por arrendamientos, en el concepto 1307.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1308,
            'concepto'=>'Retención por otros conceptos, en el concepto 1308.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1309,
            'concepto'=>'Retención en la fuente en el impuesto sobre las ventas, en el concepto 1309.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1310,
            'concepto'=>'Retención por dividendos y participaciones, en el concepto 1310.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1311,
            'concepto'=>'Retención por enajenación de activos fijos de personas naturales ante oficinas de tránsito y otras entidades autorizadas, en el concepto 1311.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1312,
            'concepto'=>'Retención por ingresos de tarjetas débito y crédito, en el concepto 1312.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1313,
            'concepto'=>'Retención por loterías, rifas, apuestas y similares, en el concepto 1313.',
            'formato_id'=>3]);
        conceptoDianExogeno::create([
            'codigo'=>1314,
            'concepto'=>'Retención por impuesto de timbre, en el concepto 1314.',
            'formato_id'=>3]);

        conceptoDianExogeno::create(['codigo'=>4001,
            'concepto'=>'Ingresos brutos de actividades ordinarias.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4002,
            'concepto'=>'Otros ingresos brutos.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4003,
            'concepto'=>'Ingresos por intereses y rendimientos financieros.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4004,
            'concepto'=>'Ingresos por intereses correspondientes a créditos hipotecarios.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4005,
            'concepto'=>'Ingresos a través de consorcio o uniones temporales.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4006,
            'concepto'=>'Ingresos a través de mandato o administración delegada.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4007,
            'concepto'=>'Ingresos a través de exploración y explotación de hidrocarburos, gases y minerales.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4008,
            'concepto'=>'Ingresos a través de fiducia.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4009,
            'concepto'=>'Ingresos a través de terceros (Beneficiario)','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4011,
            'concepto'=>'Ingresos a través de Joint Venture.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4012,
            'concepto'=>'Ingresos a través de cuentas en participación.','formato_id'=>4]);
        conceptoDianExogeno::create(['codigo'=>4013,
            'concepto'=>'Ingresos a través de convenios de cooperación con entidades públicas.','formato_id'=>4]);

        conceptoDianExogeno::create(['codigo'=>2201,
            'concepto'=>'El valor del saldo de los pasivos con proveedores, en el concepto 2201.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2202,
            'concepto'=>'El valor del saldo de los pasivos con compañías vinculadas accionistas y socios, en el concepto 2202.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2203,
            'concepto'=>'El valor del saldo de las obligaciones financieras, en el concepto 2203.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2204,
            'concepto'=>'El valor del saldo de los pasivos por impuestos, gravámenes y tasas, en el concepto 2204.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2205,
            'concepto'=>'El valor del saldo de los pasivos laborales, en el concepto 2205.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2206,
            'concepto'=>'El valor del saldo de los demás pasivos, en el concepto 2206.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2207,
            'concepto'=>'El valor del saldo del pasivo determinado por el cálculo actuarial, en el concepto 2207, con el NIT. del informante.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2208,
            'concepto'=>'El valor de los pasivos respaldados en documento de fecha cierta, en el concepto 2208.','formato_id'=>5]);
        conceptoDianExogeno::create(['codigo'=>2209,
            'concepto'=>'El valor de los pasivos exclusivos de las compañías de seguros, en el concepto 2209.','formato_id'=>5]);

        conceptoDianExogeno::create(['codigo'=>1315,
            'concepto'=>'El valor total del saldo de las cuentas por cobrar a clientes, en el concepto 1315.','formato_id'=>6]);
        conceptoDianExogeno::create(['codigo'=>1316,
            'concepto'=>'El valor total del saldo de las cuentas por cobrar a accionistas, socios, comuneros, cooperados y compañías vinculadas, en el concepto 1316.','formato_id'=>6]);
        conceptoDianExogeno::create(['codigo'=>1317,
            'concepto'=>'El valor total de otras cuentas por cobrar, en el concepto 1317.','formato_id'=>6]);
        conceptoDianExogeno::create(['codigo'=>1318,
            'concepto'=>'El valor total del saldo fiscal del deterioro de cartera, identificándolo con el NIT del deudor, en el concepto 1318.','formato_id'=>6]);

        conceptoDianExogeno::create([
            'codigo'=>22761,
            'concepto'=>'Pagos por salarios.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22762,
            'concepto'=>'Pagos por emolumentos eclesiásticos.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22763,
            'concepto'=>'Pagos por honorarios.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22764,
            'concepto'=>'Pagos por servicios.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22765,
            'concepto'=>'Pagos por comisiones.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22766,
            'concepto'=>'Pagos por prestaciones sociales.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22767,
            'concepto'=>'Pagos por viáticos.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22768,
            'concepto'=>'Pagos por gastos de representación.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22769,
            'concepto'=>'Pago por compensaciones por el trabajo asociado cooperativo',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>22770,
            'concepto'=>'Otros pagos.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227611,
            'concepto'=>'Pagos realizados con bonos electrónicos o de papel de servicio, cheques, tarjetas, vales, etc.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227612,
            'concepto'=>'16. Cesantías e intereses de cesantías efectivamente pagadas, consignadas o reconocidas en el período',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227613,
            'concepto'=>'Pensiones de jubilación, vejez o invalidez.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227614,
            'concepto'=>'Aportes obligatorios por salud.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227615,
            'concepto'=>' Aportes obligatorios a fondos de pensiones y solidaridad pensional y aportes voluntarios al RAIS.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227616,
            'concepto'=>'Aportes voluntarios a fondos de pensiones voluntarias.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227617,
            'concepto'=>'Aportes a cuentas AFC.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>227618,
            'concepto'=>'Valores de las retenciones en la fuente por pagos de rentas de trabajo o pensiones.',
            'formato_id'=>7]);
        conceptoDianExogeno::create([
            'codigo'=>0000,
            'concepto'=>'FALTANTE',
            'formato_id'=>8]);

    }
}
