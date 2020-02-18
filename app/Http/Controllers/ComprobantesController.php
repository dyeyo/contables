<?php

namespace App\Http\Controllers;

use App\Comprobante;
use App\Empresa;
use App\TipoPresupuesto;
use App\TipoPresupuestoComprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ComprobantesController extends Controller
{

    public function index()
    {
        $panel=Comprobante::all();
        return view('panelControl.index',compact('panel'));
    }

    public function create()
    {
        $tipoPresupuesto=TipoPresupuesto::all();
        $empresa=Empresa::all();
        return view('panelControl.create',compact('tipoPresupuesto','empresa'));
    }

    public function store(Request $request)
    {
        $comprobante = new Comprobante();
        $comprobante->abreviatura = $request->abreviatura;
        $comprobante->nombreSoporte = $request->nombreSoporte;
        $comprobante->tesoreria = $request->tesoreria;
        $comprobante->contabilidad = $request->contabilidad;
        $comprobante->naturaleza = $request->naturaleza;
        $comprobante->activarDescuentos = $request->activarDescuentos;
        $comprobante->reporteSIA = $request->reporteSIA;
        $comprobante->estado = $request->estado;
        $comprobante->empresa_id = $request->empresa_id;
        //dd($comprobante);
        $comprobante->save();
        if ($request->tipoPresupuesto_id) {
            $tipoPresupuesto = $request->tipoPresupuesto_id;
            foreach ($tipoPresupuesto as $key => $value) {
                $comprobante->tipoPresupuestoComprobante()->create([
                    'comprobante_id' => $request->comprobante_id[$key],
                    'tipoPresupuesto_id' => $request->tipoPresupuesto_id[$key],
                ]);
            }
        }

        Session::flash('message', 'El registro se creo con exito');
        return redirect()->route('panel.index');
    }


    public function edit($id)
    {
        $tipoPresupuestoComprobante= DB::table('tipo_presupuesto_comprobantes')
                                    ->join('tipo_presupuestos', 'tipo_presupuesto_comprobantes.tipoPresupuesto_id',
                                        '=', 'tipo_presupuestos.id')
                                    ->join('comprobantes', 'tipo_presupuesto_comprobantes.comprobante_id',
                                        '=', 'comprobantes.id')
                                    ->select('comprobantes.id','tipo_presupuestos.nombrePresupuesto',
                                        'tipo_presupuesto_comprobantes.comprobante_id')
                                    //->where('tipo_presupuesto_comprobantes.comprobante_id',$id)
                                    ->get();
        //dd($tipoPresupuestoComprobante);
        $comprobante = Comprobante::findOrFail($id);
        //$comprobante=Comprobante::findOrFail($id);
        $tipoPresupuesto=TipoPresupuesto::all();

        //$tipoPresupuestoComprbante=TipoPresupuestoComprobante::where('comprobante_id',$id)->get();
        $empresa=Empresa::all();
        return view('panelControl.edit',compact('comprobante','empresa','tipoPresupuesto',
                                            'tipoPresupuestoComprobante'));

    }


    public function update(Request $request, $id)
    {
        $comprobante=Comprobante::findOrFail($id);
        //dd($request->all())
        $comprobante->abreviatura = $request->abreviatura;
        $comprobante->nombreSoporte = $request->nombreSoporte;
        $comprobante->tesoreria = $request->tesoreria;
        $comprobante->contabilidad = $request->contabilidad;
        $comprobante->naturaleza = $request->naturaleza;
        $comprobante->activarDescuentos = $request->activarDescuentos;
        $comprobante->reporteSIA = $request->reporteSIA;
        $comprobante->estado = $request->estado;
        $comprobante->empresa_id = $request->empresa_id;
        $comprobante->save();
        //dd($comprobante);
        if ($request->tipoPresupuesto_id) {
            $tipoPresupuesto = $request->tipoPresupuesto_id;

            foreach ($tipoPresupuesto as $key => $value) {
                $comprobante->tipoPresupuestoComprobante()->create([
                    'comprobante_id' => $request->comprobante_id[$key],
                    'tipoPresupuesto_id' => $request->tipoPresupuesto_id[$key],
                ]);
            }
        }

        Session::flash('message', 'El registro se edito con exito');
        return redirect()->route('panel.index');
    }

    public function destroy($id)
    {
        try {
            $comprobante=Comprobante::findOrFail($id);
            $comprobante->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','El registro no puede ser eliminado, debe eliminar primero las tipos de presupuetos asociados');
            return redirect()->route('panel.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        return redirect()->route('panel.index')->with('message', 'Eliminado correctamente');

    }


    public function destroyTipoPresupuesto($id)
    {
        $comprobante=TipoPresupuestoComprobante::findOrFail($id);
        //dd($comprobante);
        $comprobante->delete();
        Session::flash('message', 'El tipo de presupuesto se elimino con exito');
        return back();
    }
}
