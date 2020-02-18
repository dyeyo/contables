<?php

namespace App\Http\Controllers;

use App\PlantillaContable;
use App\RetencionDescuentos;
use App\Transacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrasaccionesEditarController extends Controller
{
    public function update(Request $request, $id)
    {
        $trasacciones = Transacciones::findOrFail($id);
        $trasacciones->anio = $request->anio;
        $trasacciones->mes = $request->mes;
        $trasacciones->dia = $request->dia;
        //DEMAS CAMPOS
        $trasacciones->numero_doc = $request->numero_doc;
        $trasacciones->codigo_presupuesto = $request->codigo_presupuesto;
        $trasacciones->valor_transaccion = $request->valor_transaccion;
        $trasacciones->codigo_presupuesto_letras = $request->codigo_presupuesto_letras;
        $trasacciones->valorBase = $request->valorBase;
        $trasacciones->revelacion = $request->revelacion;
        $trasacciones->tercero_id = $request->tercero_id;
        $trasacciones->comprobante_id = $request->comprobante_id;
        $trasacciones->tipo_presupuesto_id = $request->tipo_presupuesto_id;
        $trasacciones->detalle = $request->detalle;
        $trasacciones->plantilla = $request->plantilla;
        $trasacciones->total_debito= $request->total_debito;
        $trasacciones->total_credito = $request->total_credito;
        $trasacciones->diferencia = $request->diferencia;
        $trasacciones->tipoPago = $request->tipoPago;
        $trasacciones->tarifa_iva = $request->tarifa_iva;
        $trasacciones->valor_iva = $request->valor_iva;
        $trasacciones->nombre_plantilla = $request->nombre_plantilla;
        $trasacciones->est_transaccion_id = 4;
        $trasacciones->fecha_movimiento= $request->anio.'-'.$request->mes.'-'.$request->dia;
        if ($request->transacciones_id){
            $plantillaContable = $request->transacciones_id;
            foreach($plantillaContable as $key => $value) {
                $trasacciones->plantilaContable()->create([
                    'transacciones_id' => $request->transacciones_id[$key],
                    'docReferencia' => $request->docReferencia[$key],
                    'centro_costo_id' => $request->centro_costo_id[$key],
                    'debito' => $request->debito[$key],
                    'credito' => $request->credito[$key],
                    'nota' => $request->nota[$key],
                    'valor_retenido' => $request->valor_retenido[$key],
                    'codigoNIIIF' => $request->codigoNIIIF[$key],
                    'puc_id' => $request->puc_id[$key],
                    'tercero_plantilla' => $request->tercero_plantilla[$key],
                    'fecha_movimiento' => $request->fecha_movimiento[$key],
                ]);
            }
        }
        $trasacciones->save();

        Session::flash('message', 'SOPORTE SE CONTABILIZO CON EXITO');
        //return view('transacciones.index',compact('trasacciones'));
        return redirect()->route('transaccion.index');
        //return redirect()->route('transaccion.editSoporte',$trasacciones->id);
    }

    public function cambiaraEliminado(Request $request, $id)
    {
        $retencion=RetencionDescuentos::findOrFail($id);
        //dd($request->all());
        $retencion->codigoPresupuesto=1;
        $retencion->save();

        if ($request->retencion_descuentos_id) {
            $detalleRetencion = $request->retencion_descuentos_id;
            foreach ($detalleRetencion as $key => $value) {

                $retencion->debitoCredtoRetencion()->create([
                    'retencion_descuentos_id' => $request->retencion_descuentos_id[$key],
                    'debito' => $request->debito[$key],
                    'credito' => $request->credito[$key],
                    'puc_id' => $request->puc_id[$key],
                ]);
            }
        }
        Session::flash('message','Retencion Eliminada con éxito');
        return redirect()->route('retenciones.index');
    }

    public function estadoPlantilla(Request $request, $id)
    {
        //dd($request->all());
        $plantilla=PlantillaContable::findOrFail($id);
        $temporalDebito= $request->debitoTemporal;
        $temporalCredito= $request->creditoTemporal;
        //$plantilla->diferencia=$request->diferencia;
        $plantilla->codigoNIIIF= $request->codigoNIIIF;
        $plantilla->valor_retenido= $request->valor_retenido;
        $plantilla->retencion_descuento_id= $request->retencion_descuento_id;
        $plantilla->transacciones_id= $request->transacciones_id;
        $plantilla->debito= $request->debito;
        $plantilla->credito= $request->credito;
        $plantilla->transacciones_id= $request->transacciones_id;
        $plantilla->fecha_movimiento= $request->fecha_movimiento;
        $plantilla->est_registro_id= $request->est_registro_id;
        $plantilla->puc_id= $request->puc_id;
        $plantilla->centro_costo_id= $request->centro_costo_id;
        $plantilla->tercero_plantilla= $request->tercero_plantilla;
        $plantilla->debito= $request->debito;
        $plantilla->credito= $request->credito;
        $plantilla->docReferencia= $request->docReferencia;
        $plantilla->codigoNIIIF= $request->codigoNIIIF;
        $plantilla->nota= $request->nota;
        $plantilla->update();
        //dd($request->totalDebito);
        $idP = $plantilla->transacciones_id;
        $trans = Transacciones::findOrFail($idP);
        if ($request->debitoTemporal){
            $restaDebito=$temporalDebito-$request->total_debito;
            $trans->total_debito=$restaDebito;
            //$diferencia=$trans->diferencia = $trans->total_credito-$trans->total_credito;
        }else{
            $restaCredito=$temporalCredito-$request->total_credito;
            $trans->total_credito=$restaCredito;
            //$diferencia=$trans->diferencia = $trans->total_credito-$trans->total_credito;
        }

        $trans->update();
        /*if ($diferencia!=0){
            Session::flash('messageMalo', 'Verifica que tus cambios de credito o debito sea para un total de 0');
            return back();
        }else {*/
            Session::flash('message', 'La plantilla se edito con exito');
            return back();
     //   }
    }
}
