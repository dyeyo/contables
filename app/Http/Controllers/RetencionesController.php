<?php

namespace App\Http\Controllers;

use App\DebitoCreditoRetenciones;
use App\Empresa;
use App\Exports\RetencionesExport;
use App\Persona;
use App\Puc;
use App\RetencionDescuentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class RetencionesController extends Controller
{

    public function index()
    {
        $anio = session('year');
        $retenciones=RetencionDescuentos::select('id','tipoRetencion','concepto', 'anio', 'base_inical', 'monto_minimo','base_final','tarifa_retencion')
                                        ->where('RetoDes','=',null)
                                        ->where('anio',$anio)
                                        ->where('eliminada',2)
                                        ->get();
        return view('retenciones.index',compact('retenciones'));
    }

    public function create()
    {
        $puc=Puc::all();
        $terceros = Persona::with('natural', 'juridica', 'empleado')->get();
        $anio = session('year');
        $empresa=Empresa::with('retencionDescuentos')->get();
        return view('retenciones.create',compact('puc','empresa','anio','terceros'));

    }

    public function store(Request $request)
    {
        $retencion = new RetencionDescuentos;

        //RetencionDescuentos::create($request->all());
        $retencion->tipoRetencion=$request->tipoRetencion;
        $retencion->concepto=$request->concepto;
        $retencion->tarifa_retencion=$request->tarifa_retencion;
        $retencion->puc_id_retencion=$request->puc_id_retencion;
        $retencion->tercero_id=$request->tercero_id;
        $retencion->territorialidad=$request->territorialidad;
        $retencion->mecanismo=$request->mecanismo;
        $retencion->anio=$request->anio;
        $retencion->porcentaje=$request->porcentaje;
        $retencion->base_inical=$request->base_inical;
        $retencion->base_final=$request->base_final;
        $retencion->monto_minimo=$request->monto_minimo;
        $retencion->iva=$request->iva;
        $retencion->valor_fijo=$request->valor_fijo;
        $retencion->base_calculco=$request->base_calculco;
        $retencion->reporte_sia=$request->reporte_sia;
        $retencion->ingreso=$request->ingreso;
        $retencion->activo=$request->activo;
        $retencion->automatico=$request->automatico;
        $retencion->codigoPresupuesto=$request->codigoPresupuesto;
        $retencion->eliminada=$request->eliminada;
        //dd($retencion);
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

        Session::flash('message','Retencion Creada con éxito');
        return redirect()->route('retenciones.index');
    }

    public function edit($id)
    {

        $retencion=RetencionDescuentos::findOrFail($id);
        $pucs=Puc::all();
        //dd($pucs);
        $anio = session('year');
        $cuentaPucRetencionDebito=DebitoCreditoRetenciones::join('pucs', 'pucs.id', '=', 'debito_credito_retenciones.puc_id')
                                                        ->select('debito_credito_retenciones.id','debito_credito_retenciones.puc_id',
                                                            'debito_credito_retenciones.retencion_descuentos_id','pucs.codigo_cuenta',
                                                            'pucs.nombre_cuenta')
                                                        ->where('debito_credito_retenciones.retencion_descuentos_id',$id)
                                                        ->where('debito','1')
                                                        ->get();
        $cuentaPucRetencionCredito=DebitoCreditoRetenciones::join('pucs', 'pucs.id', '=', 'debito_credito_retenciones.puc_id')
                                                            ->select('debito_credito_retenciones.id','debito_credito_retenciones.puc_id',
                                                                'debito_credito_retenciones.retencion_descuentos_id','pucs.codigo_cuenta',
                                                                'pucs.nombre_cuenta')
                                                            ->where('debito_credito_retenciones.retencion_descuentos_id',$id)
                                                            ->where('credito','1')
                                                            ->get();
        //dd($cuentaPucRetencionDebito, $cuentaPucRetencionCredito);
        $terceros = Persona::with('natural', 'juridica', 'empleado')->get();
        $empresa=Empresa::with('retencionDescuentos')->get();
        return view('retenciones.edit',compact('empresa','pucs','retencion','terceros','anio','cuentaPucRetencionDebito',
            'cuentaPucRetencionCredito'));
    }

    public function update(Request $request, $id)
    {
        $retencion=RetencionDescuentos::findOrFail($id);
        //dd($request->all());
        $retencion->tipoRetencion=$request->tipoRetencion;
        $retencion->concepto=$request->concepto;
        $retencion->tarifa_retencion=$request->tarifa_retencion;
        $retencion->puc_id_retencion=$request->puc_id_retencion;
        $retencion->tercero_id=$request->tercero_id;
        $retencion->territorialidad=$request->territorialidad;
        $retencion->mecanismo=$request->mecanismo;
        $retencion->anio=$request->anio;
        $retencion->porcentaje=$request->porcentaje;
        $retencion->base_inical=$request->base_inical;
        $retencion->base_final=$request->base_final;
        $retencion->monto_minimo=$request->monto_minimo;
        $retencion->iva=$request->iva;
        $retencion->valor_fijo=$request->valor_fijo;
        $retencion->base_calculco=$request->base_calculco;
        $retencion->reporte_sia=$request->reporte_sia;
        $retencion->ingreso=$request->ingreso;
        $retencion->activo=$request->activo;
        $retencion->automatico=$request->automatico;
        $retencion->codigoPresupuesto=$request->codigoPresupuesto;
        $retencion->eliminada=$request->eliminada;
        //dd($retencion);
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
        Session::flash('message','Retencion Editada con éxito');
        return redirect()->route('retenciones.index');
    }



    public function destroy($id) {

        //dd($id);
        $cuentaRetencion = RetencionDescuentos::find($id);
        $cuentaRetencion->delete();

        Session::flash('message','Retencion Eliminada con éxito');
        return back();
    }

    public function exportRetencion()
    {
        //return (new NiffExport)->download('NIF.xlsx');
        return Excel::download(new RetencionesExport(),'Retencion.xlsx');
    }
}
