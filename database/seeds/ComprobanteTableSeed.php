<?php

use Illuminate\Database\Seeder;
use App\Comprobante;

class ComprobanteTableSeed extends Seeder
{

    public function run()
    {
        Comprobante::create(['abreviatura'=>'CESP','nombreSoporte'=>'COMPROBANTE DE EGRESO SIN AFECTACION PRESUPUESTAL','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NCSP','nombreSoporte'=>'NOTA CREDITO SIN AFECTACION PRESUPUESTAL','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NDSP','nombreSoporte'=>'NOTA DEBITO SIN AFECTACION PRESUPUESTAL','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NCBT','nombreSoporte'=>'NOTA CREDITO BANCARIA INGRESOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'TRAN','nombreSoporte'=>'TRANSFERENCIAS Y SUBVENCIONES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NCON','nombreSoporte'=>'NOTAS CONTABLES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'TFIN','nombreSoporte'=>'TRANSFERENCIA DE FONDOS INTERNOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'COBA','nombreSoporte'=>'CONSIGNACIONES BANCARIAS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'DEPR','nombreSoporte'=>'DEPRECIACIONES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'AMOR','nombreSoporte'=>'AMORTIZACUONES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'AJUS','nombreSoporte'=>'AJUSTES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NOMI','nombreSoporte'=>'NOMINA','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'FACT','nombreSoporte'=>'FACTURA','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'DIFE','nombreSoporte'=>'DIFERIDOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'CCON','nombreSoporte'=>'COMPRAS - FACTURAS - CONTADO','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'CCRE','nombreSoporte'=>'COMPRAS - FACTURAS - CREDITO','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'DEVC','nombreSoporte'=>'DEVOLUCION EN COMPRAS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'VECO','nombreSoporte'=>'VENTAS FACTURACION CONTADO','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'VECR','nombreSoporte'=>'VENTAS FACTURACION CREDITO','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'DEVV','nombreSoporte'=>'DEVOLUCION EN VENTAS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'EG_D','nombreSoporte'=>'EGRESOS Y DESCUENTOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'OTIN','nombreSoporte'=>'OTROS INGRESOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'OTEG','nombreSoporte'=>'OTROS EGRESOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'ARRE','nombreSoporte'=>'ARRENDAMIENTOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'RECC','nombreSoporte'=>'RECIBO CAJA CUENTAS POR COBRAR','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NCBA','nombreSoporte'=>'NOTAS CREDITO ABONO DE CLIENTES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'NDBA','nombreSoporte'=>'NOTAS DEBITO PAGO A CLIENTES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'RECA','nombreSoporte'=>'RECIBO CAJA','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'SICO','nombreSoporte'=>'SALDOS INICIALES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'CIER','nombreSoporte'=>'CIERRE DEL AÑO','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'ESFA','nombreSoporte'=>'BALANCE DE APERTURA','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'REVE','nombreSoporte'=>'REVERSION DE DOCUMENTOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'REIP','nombreSoporte'=>'RECONOCIMIENTO DE INGRESOS PRESUPUESTALES','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'ROIT','nombreSoporte'=>'RECIBO OFICIAL DE INGRESOS - TESORERIA','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'RCGT','nombreSoporte'=>'RECIBO DE CAJA GENERAL','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'CDPP','nombreSoporte'=>'CERTIFICADO DE DISPONIBILIDAD PRESUPUESTAL','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'CRPP','nombreSoporte'=>'CERTIFICADO DE REGISTRO PRESUPUESTAL','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'COBP','nombreSoporte'=>'CERTIFICADO OBLIGACION PRESUPUESTAL ','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'REPA','nombreSoporte'=>'RECONOCIMIENTO DE PASIVOS POR BIENES Y SERVICIOS','empresa_id'=>1]);
        Comprobante::create(['abreviatura'=>'CE','nombreSoporte'=>'COMPROBANTE DE EGRESO','empresa_id'=>1]);
    }
}
