<?php

namespace App\Http\Controllers;

use App\Comprobante;
use App\Empresa;
use App\Exports\TransaccionesExport;
use App\Http\Requests\TrassaccionesRequest;
use App\Imports\TrasnsacciomImport;
use App\Niff;
use App\PlantillaContable;
use App\Persona;
use App\Puc;
use App\RetencionDescuentos;
use App\Sede;
use App\TipoPresupuesto;
use App\Transacciones;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TrasaccionesController extends Controller
{
    public function index()
    {
        $anio = session('year');
        $trasacciones = DB::table('transacciones')
            ->leftJoin('personas', 'transacciones.tercero_id', '=', 'personas.id')
            ->leftJoin('tipo_presupuestos', 'transacciones.tipo_presupuesto_id', '=', 'tipo_presupuestos.id')
            ->leftJoin('comprobantes', 'transacciones.comprobante_id', '=', 'comprobantes.id')
            ->select('transacciones.id','transacciones.anio','transacciones.mes','transacciones.dia', 'transacciones.numero_doc',
                'transacciones.valor_transaccion','transacciones.codigo_presupuesto_letras',
                'transacciones.codigo_presupuesto', 'transacciones.tipoPago','transacciones.valorBase', 'transacciones.revelacion',
                'transacciones.tercero_id', 'transacciones.comprobante_id',
                'transacciones.tipo_presupuesto_id','transacciones.plantilla','transacciones.total_debito','transacciones.total_credito',
                'transacciones.diferencia','transacciones.detalle','transacciones.est_transaccion_id',
                'transacciones.fecha_movimiento','transacciones.tarifa_iva','transacciones.valor_iva','transacciones.est_transaccion_id',
                'personas.nombre1', 'personas.nombre2', 'personas.apellido', 'personas.apellido2',
                'comprobantes.nombreSoporte', 'tipo_presupuestos.nombrePresupuesto')
            ->where('transacciones.plantilla', '=', 'NO')
            ->where('transacciones.est_transaccion_id', '=', 4)
            ->where('transacciones.anio',$anio)
            ->get();
        //dd($trasacciones);
        $trasaccionesErronea=DB::table('transacciones')
            ->leftJoin('personas', 'transacciones.tercero_id', '=', 'personas.id')
            ->leftJoin('tipo_presupuestos', 'transacciones.tipo_presupuesto_id', '=', 'tipo_presupuestos.id')
            ->leftJoin('comprobantes', 'transacciones.comprobante_id', '=', 'comprobantes.id')
            ->select('transacciones.id','transacciones.anio','transacciones.mes','transacciones.dia', 'transacciones.numero_doc',
                'transacciones.valor_transaccion','transacciones.codigo_presupuesto_letras',
                'transacciones.codigo_presupuesto', 'transacciones.tipoPago','transacciones.valorBase', 'transacciones.revelacion',
                'transacciones.tercero_id', 'transacciones.comprobante_id',
                'transacciones.tipo_presupuesto_id','transacciones.plantilla','transacciones.total_debito','transacciones.total_credito',
                'transacciones.diferencia','transacciones.detalle',
                'transacciones.fecha_movimiento','transacciones.tarifa_iva','transacciones.valor_iva','transacciones.est_transaccion_id',
                'personas.nombre1', 'personas.nombre2', 'personas.apellido', 'personas.apellido2',
                'comprobantes.nombreSoporte', 'tipo_presupuestos.nombrePresupuesto')
            ->where('transacciones.plantilla', '=', 'NO')
            ->where('transacciones.est_transaccion_id', '=', 1)
            ->where('transacciones.anio',$anio)
            ->get();

        $trasaccionesPlantilla =DB::table('transacciones')
            ->leftJoin('personas', 'transacciones.tercero_id', '=', 'personas.id')
            ->leftJoin('tipo_presupuestos', 'transacciones.tipo_presupuesto_id', '=', 'tipo_presupuestos.id')
            ->leftJoin('comprobantes', 'transacciones.comprobante_id', '=', 'comprobantes.id')
            ->select('transacciones.id', 'transacciones.anio', 'transacciones.mes', 'transacciones.dia','transacciones.nombre_plantilla',
                'transacciones.numero_doc', 'transacciones.valor_transaccion', 'transacciones.codigo_presupuesto_letras',
                'personas.nombre1', 'personas.nombre2', 'personas.apellido', 'personas.apellido2','transacciones.nombre_plantilla',
                'comprobantes.nombreSoporte', 'tipo_presupuestos.nombrePresupuesto', 'transacciones.valorBase')
            ->where('transacciones.plantilla', '=', 'SI')
            ->where('transacciones.anio',$anio)
            ->get();
        $tipoPresupuesnto = TipoPresupuesto::all();
        //dd($retenciones);
        return view('transacciones.index', compact('trasacciones', 'trasaccionesPlantilla',
            'tipoPresupuesnto','trasaccionesErronea'));
    }

    public function create()
    {
        $anio = session('year');
        $comprobante = Comprobante::select('id', 'abreviatura', 'nombreSoporte', 'activarDescuentos')
            ->where('estado', '=', 'SI')
            ->get();
        $puc = Puc::select('id', 'codigo_cuenta', 'nombre_cuenta', 'tipoCuenta_id')->get();
        $niif = Niff::all();
        $ultimonumero_doc=Transacciones::select('id','numero_doc')->orderby('id','DESC')->take(1)->get();
        //dd($ultimonumero_doc);
        $centroCosto = Sede::all();
        $numDocs = Transacciones::select('numero_doc', 'created_at')->get();
        $terceros = Persona::with('natural', 'juridica', 'empleado')->get();
        //dd($terceros);
        //$tipoPresupuestos = Comprobante::with('tipoPresupuesto');
        $tipoPresupuestos = TipoPresupuesto::all();
        //dd($tipoPresupuestos);
        $retenciones = DB::table('retencion_descuentos')
            ->leftJoin('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            ->leftJoin('niffs', 'niffs.puc_id', '=', 'pucs.id')
            ->leftJoin('personas', 'retencion_descuentos.tercero_id', '=', 'personas.id')
            ->leftJoin('personas_empleados', 'personas.natural_id', '=', 'personas_empleados.id')
            ->leftJoin('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->leftJoin('personas_naturales', 'personas.empleado_id', '=', 'personas_naturales.id')
            ->select('retencion_descuentos.id', 'retencion_descuentos.tipoRetencion', 'retencion_descuentos.iva',
                'retencion_descuentos.concepto', 'retencion_descuentos.porcentaje', 'pucs.codigo_cuenta', 'pucs.nombre_cuenta',
                'niffs.codigoNiff','retencion_descuentos.monto_minimo','retencion_descuentos.base_inical','retencion_descuentos.base_final'
                ,'retencion_descuentos.iva','retencion_descuentos.valor_fijo','personas.nombre1', 'personas.nombre2','retencion_descuentos.mecanismo',
                'personas.apellido', 'personas.apellido2','personas.raz_social','personas_empleados.numeroDocumento','personas_juridicas.nit','personas_naturales.numeroDocumento')
            ->where('retencion_descuentos.anio',$anio)
            ->where('retencion_descuentos.activo','1')
            ->get();
        return view('transacciones.create', compact('comprobante', 'retenciones',
            'tipoPresupuestos', 'terceros', 'numDocs', 'puc', 'niif', 'centroCosto','ultimonumero_doc'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $trasacciones= new Transacciones;
        $erros = \Validator::make($request->all(), [
            'numero_doc' => 'unique:transacciones'
        ]);
        if ($erros->fails()) {
            return redirect()->back()->withInput()->withErrors($erros->errors());
        }
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
        $trasacciones->diferencia = $request->diferencia;
        $trasacciones->tipoPago = $request->tipoPago;
        $trasacciones->tarifa_iva = $request->tarifa_iva;
        $trasacciones->valor_iva = $request->valor_iva;
        $trasacciones->nombre_plantilla = $request->nombre_plantilla;
        //$trasacciones->est_transaccion_id = 4;
        $trasacciones->fecha_movimiento= $request->fecha_movimiento;
        $trasacciones->save();
        Session::flash('message', '...EDITADO, continue con los registros contable');
        //return view('transacciones.index',compact('trasacciones'));
        return redirect()->route('transaccion.editSoporte',$trasacciones->id);
    }

    public function editSoporte($id)
    {
        $anio = session('year');
        $trasacciones = Transacciones::findOrFail($id);
        $comprobante = Comprobante::select('id', 'abreviatura', 'nombreSoporte', 'activarDescuentos')
            ->where('estado', '=', 'SI')
            ->get();
        $puc = Puc::select('id', 'codigo_cuenta', 'nombre_cuenta', 'tipoCuenta_id')->where('id','!=',1)->orderBy('id','ASC')->get();
        $centroCosto = Sede::all();
        $niif = Niff::all();
        $numDocs = Transacciones::select('numero_doc', 'created_at')->get();
        $terceros = Persona::with('natural', 'juridica', 'empleado')->get();
        $tipoPresupuestos = TipoPresupuesto::all();
        $plantillaRetenciones = DB::table('plantilla_contables')
            ->join('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->leftJoin('pucs', 'plantilla_contables.puc_id', '=', 'pucs.id')
            ->select('plantilla_contables.id', 'plantilla_contables.docReferencia', 'plantilla_contables.centro_costo_id',
                'plantilla_contables.debito', 'plantilla_contables.credito','plantilla_contables.fecha_movimiento','plantilla_contables.nota', 'plantilla_contables.codigoNIIIF', 'plantilla_contables.transacciones_id',
                'plantilla_contables.transacciones_id', 'plantilla_contables.valor_retenido', 'plantilla_contables.retencion_descuento_id',
                'puc_id', 'transacciones.total_debito', 'transacciones.total_credito', 'transacciones.diferencia','plantilla_contables.est_registro_id',
                'pucs.codigo_cuenta', 'pucs.nombre_cuenta','plantilla_contables.tercero_plantilla')
            ->where('plantilla_contables.est_registro_id', 1)
            ->where('plantilla_contables.transacciones_id', '=', $id)
            ->get();

        $retenciones = DB::table('retencion_descuentos')
            ->leftJoin('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            ->leftJoin('niffs', 'niffs.puc_id', '=', 'pucs.id')
            ->leftJoin('personas', 'retencion_descuentos.tercero_id', '=', 'personas.id')
            ->leftJoin('personas_empleados', 'personas.natural_id', '=', 'personas_empleados.id')
            ->leftJoin('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->leftJoin('personas_naturales', 'personas.empleado_id', '=', 'personas_naturales.id')
            ->select('retencion_descuentos.id', 'retencion_descuentos.tipoRetencion', 'retencion_descuentos.iva',
                'retencion_descuentos.concepto', 'retencion_descuentos.porcentaje', 'pucs.codigo_cuenta', 'pucs.nombre_cuenta',
                'niffs.codigoNiff','retencion_descuentos.monto_minimo','retencion_descuentos.base_inical','retencion_descuentos.base_final'
                ,'retencion_descuentos.iva','retencion_descuentos.valor_fijo','personas.nombre1', 'personas.nombre2','retencion_descuentos.mecanismo',
                'personas.apellido', 'personas.apellido2','personas.raz_social','personas_empleados.numeroDocumento','personas_juridicas.nit','personas_naturales.numeroDocumento')
            ->where('retencion_descuentos.anio',$anio)
            ->get();
        //dd($retenciones);
        return view('transacciones.editPlantilla', compact('comprobante', 'retenciones',
            'tipoPresupuestos', 'terceros', 'numDocs', 'trasacciones', 'plantillaRetenciones', 'puc', 'niif', 'centroCosto'));
    }

    public function editTransaccionNoContabilizada(Request $request, $id)
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
        //$trasacciones->est_transaccion_id = 4;
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

        Session::flash('message', 'SOPORTE EN ESTADO BORRADOR/PENDIENTE');
        //return view('transacciones.index',compact('trasacciones'));
        return redirect()->route('transaccion.index');
        //return redirect()->route('transaccion.editSoporte',$trasacciones->id);
    }

    public function duplicate(Request $request, $id)
    {
        $anio = session('year');
        $trasacciones = Transacciones::findOrFail($id);
        //dd($trasacciones);
        $comprobante = Comprobante::select('id', 'abreviatura', 'nombreSoporte', 'activarDescuentos')
            ->where('estado', '=', 'SI')
            ->get();
        $puc = Puc::all();
        $ultimonumero_doc=Transacciones::select('id','numero_doc')->orderby('id','DESC')->take(1)->get();
        $centroCosto = Sede::all();
        $niif = Niff::all();
        $numDocs = Transacciones::select('numero_doc', 'created_at')->get();
        $terceros = Persona::with('natural', 'juridica', 'empleado')->get();
        $tipoPresupuestos = TipoPresupuesto::all();
        $plantillaRetenciones = DB::table('plantilla_contables')
            ->join('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->leftJoin('pucs', 'plantilla_contables.puc_id', '=', 'pucs.id')
            ->select('plantilla_contables.id', 'plantilla_contables.docReferencia', 'plantilla_contables.centro_costo_id',
                'plantilla_contables.debito', 'plantilla_contables.credito', 'plantilla_contables.nota',
                'plantilla_contables.codigoNIIIF', 'plantilla_contables.transacciones_id','plantilla_contables.tercero_plantilla',
                'plantilla_contables.transacciones_id', 'plantilla_contables.valor_retenido', 'plantilla_contables.retencion_descuento_id',
                'puc_id', 'transacciones.total_debito', 'transacciones.total_credito', 'transacciones.diferencia',
                'pucs.codigo_cuenta', 'pucs.nombre_cuenta')
            ->where('plantilla_contables.transacciones_id', '=', $id)
            ->get();
        //dd($plantillaRetenciones);
        $retenciones = DB::table('retencion_descuentos')
            ->leftJoin('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            ->leftJoin('niffs', 'niffs.puc_id', '=', 'pucs.id')
            ->leftJoin('personas', 'retencion_descuentos.tercero_id', '=', 'personas.id')
            ->leftJoin('personas_empleados', 'personas.natural_id', '=', 'personas_empleados.id')
            ->leftJoin('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->leftJoin('personas_naturales', 'personas.empleado_id', '=', 'personas_naturales.id')
            ->select('retencion_descuentos.id', 'retencion_descuentos.tipoRetencion', 'retencion_descuentos.iva',
                'retencion_descuentos.concepto', 'retencion_descuentos.porcentaje', 'pucs.codigo_cuenta', 'pucs.nombre_cuenta',
                'niffs.codigoNiff','retencion_descuentos.monto_minimo','retencion_descuentos.base_inical','retencion_descuentos.base_final'
                ,'retencion_descuentos.iva','retencion_descuentos.valor_fijo','personas.nombre1', 'personas.nombre2','retencion_descuentos.mecanismo',
                'personas.apellido', 'personas.apellido2','personas.raz_social','personas_empleados.numeroDocumento','personas_juridicas.nit','personas_naturales.numeroDocumento')
            ->where('retencion_descuentos.anio',$anio)
            ->get();
        return view('transacciones.duplicar', compact('comprobante', 'retenciones',
            'tipoPresupuestos', 'terceros', 'numDocs', 'trasacciones','ultimonumero_doc',
            'plantillaRetenciones', 'puc', 'niif', 'centroCosto'));
    }

    public function edit($id)
    {
        $anio = session('year');
        $trasacciones = Transacciones::findOrFail($id);
        $comprobante = Comprobante::select('id', 'abreviatura', 'nombreSoporte', 'activarDescuentos')
            ->where('estado', '=', 'SI')
            ->get();
        $puc = Puc::select('id', 'codigo_cuenta', 'nombre_cuenta', 'tipoCuenta_id')->where('id','!=',1)->orderBy('id','ASC')->get();
        $centroCosto = Sede::all();
        $niif = Niff::all();
        $numDocs = Transacciones::select('numero_doc', 'created_at')->get();
        $terceros = Persona::with('natural', 'juridica', 'empleado')->get();
        $tipoPresupuestos = TipoPresupuesto::all();
        $plantillaRetenciones = DB::table('plantilla_contables')
            ->join('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->leftJoin('pucs', 'plantilla_contables.puc_id', '=', 'pucs.id')
            ->select('plantilla_contables.id', 'plantilla_contables.docReferencia', 'plantilla_contables.centro_costo_id',
                'plantilla_contables.debito', 'plantilla_contables.credito', 'plantilla_contables.nota','plantilla_contables.fecha_movimiento', 'plantilla_contables.codigoNIIIF', 'plantilla_contables.transacciones_id',
                'plantilla_contables.transacciones_id', 'plantilla_contables.valor_retenido', 'plantilla_contables.retencion_descuento_id',
                'puc_id', 'transacciones.total_debito', 'transacciones.total_credito', 'transacciones.diferencia','plantilla_contables.est_registro_id',
                'pucs.codigo_cuenta', 'pucs.nombre_cuenta','plantilla_contables.tercero_plantilla')
            ->where('plantilla_contables.est_registro_id', 1)
            ->where('plantilla_contables.transacciones_id', '=', $id)
            ->get();
       // dd($plantillaRetenciones);
        $retenciones = DB::table('retencion_descuentos')
            ->leftJoin('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            ->leftJoin('niffs', 'niffs.puc_id', '=', 'pucs.id')
            ->leftJoin('personas', 'retencion_descuentos.tercero_id', '=', 'personas.id')
            ->leftJoin('personas_empleados', 'personas.natural_id', '=', 'personas_empleados.id')
            ->leftJoin('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->leftJoin('personas_naturales', 'personas.empleado_id', '=', 'personas_naturales.id')
            ->select('retencion_descuentos.id', 'retencion_descuentos.tipoRetencion', 'retencion_descuentos.iva',
                'retencion_descuentos.concepto', 'retencion_descuentos.porcentaje', 'pucs.codigo_cuenta', 'pucs.nombre_cuenta',
                'niffs.codigoNiff','retencion_descuentos.monto_minimo','retencion_descuentos.base_inical','retencion_descuentos.base_final'
                ,'retencion_descuentos.iva','retencion_descuentos.valor_fijo','personas.nombre1', 'personas.nombre2','retencion_descuentos.mecanismo',
                'personas.apellido', 'personas.apellido2','personas.raz_social','personas_empleados.numeroDocumento','personas_juridicas.nit','personas_naturales.numeroDocumento')
            ->where('retencion_descuentos.anio',$anio)
            ->get();
        return view('transacciones.edit', compact('comprobante', 'retenciones',
            'tipoPresupuestos', 'terceros', 'numDocs', 'trasacciones', 'plantillaRetenciones', 'puc', 'niif', 'centroCosto'));
    }

    public function update(Request $request, $id)
    {
        $trans=Transacciones::findOrFail($id);
        $trans->anio= $request->anio;
        $trans->mes=$request->mes;
        $trans->dia=$request->dia;
        //DEMAS CAMPOS
        $trans->numero_doc= $request->numero_doc;
        $trans->codigo_presupuesto= $request->codigo_presupuesto;
        $trans->valor_transaccion= $request->valor_transaccion;
        $trans->codigo_presupuesto_letras = $request->codigo_presupuesto_letras;
        $trans->valorBase= $request->valorBase;
        $trans->revelacion= $request->revelacion;
        $trans->tercero_id= $request->tercero_id;
        $trans->comprobante_id= $request->comprobante_id;
        $trans->tipo_presupuesto_id= $request->tipo_presupuesto_id;
        $trans->detalle= $request->detalle;
        $trans->plantilla = $request->plantilla;
        $trans->total_debito= $request->total_debito;
        $trans->total_credito = $request->total_credito;
        $trans->diferencia = $request->diferencia;
        $trans->tipoPago = $request->tipoPago;
        $trans->tarifa_iva = $request->tarifa_iva;
        $trans->valor_iva = $request->valor_iva;
        $trans->nombre_plantilla = $request->nombre_plantilla;
        $trans->est_transaccion_id = 4;
        $trans->fecha_movimiento= $request->anio.'-'.$request->mes.'-'.$request->dia;
        if ($request->transacciones_id){
            $plantillaContable = $request->transacciones_id;
            foreach($plantillaContable as $key => $value) {
                $trans->plantilaContable()->create([
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
        $trans->save();

        Session::flash('message', 'El registro se CONTABILIZO con exito');
        return redirect()->route('transaccion.index');

    }

    public function savePlantilla(Request $request, $id)
    {
        $trasacciones=Transacciones::findOrFail($id);
        //Transacciones::create($request->all());
        $trasacciones->est_transaccion_id = 4;
        //DEMAS CAMPOS
        $trasacciones->save();
        if ($request->transacciones_id) {
            $plantillaContable = $request->transacciones_id;
            foreach ($plantillaContable as $key => $value) {
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
                    //'est_transaccion_id' => $request->est_transaccion_id[$key],
                ]);
            }
        }
    }

    public function anularTransaccion(Request $request, $id)
    {
        //dd($request->all());
        $trans=Transacciones::findOrFail($id);
        $trans->est_transaccion_id= $request->est_transaccion_id;
        $trans->save();
        Session::flash('message', 'El registro se elimino con exito');
        return redirect()->route('transaccion.index');
    }

    public function updatePlantilla(Request $request, $id)
    {
        $plantilla=PlantillaContable::findOrFail($id);
        $temporalDebito= $request->debitoTemporal;
        $temporalCredito= $request->creditoTemporal;
        $plantilla->docReferencia=$request->docReferencia;
        $plantilla->centro_costo_id= $request->centro_costo_id;
        $plantilla->debito= $request->debito;
        $plantilla->credito= $request->credito;
        $plantilla->nota= $request->nota;
        $plantilla->valor_retenido= $request->valor_retenido;
        $plantilla->codigoNIIIF= $request->codigoNIIIF;
        if ($request->puc_id!=1){
            $plantilla->puc_id= $request->puc_id;
        }
        $plantilla->update();
        //dd($request->totalDebito);
        $idP = $plantilla->transacciones_id;
        $trans = Transacciones::findOrFail($idP);
        if ($request->total_debito != $temporalDebito){
            if ($temporalDebito > $request->debito)
            {
                $preTotalDebito=$request->debito-$temporalDebito;
                $totalFinalDebito=$preTotalDebito+$request->total_debito;
                $trans->total_debito=$totalFinalDebito;
            }else{
                $preTotalDebito=$request->debito-$temporalDebito;
                $totalFinalDebito=$request->total_debito+$preTotalDebito;
                $trans->total_debito=$totalFinalDebito;
            }
        }
        if ($request->total_credito != $temporalCredito){
            if ($temporalCredito > $request->credito)
            {
                $preTotalCredito=$request->credito-$temporalCredito;
                $totalFinalCredito=$preTotalCredito+$request->total_credito;
                $trans->total_credito=$totalFinalCredito;
            }else{
                $preTotalCredito=$request->credito-$temporalCredito;
                $totalFinalCredito=$request->total_credito+$preTotalCredito;
                $trans->total_credito=$totalFinalCredito;
            }
            /*if($temporalDebito < $request->debito)
            {
                $preTotal=$temporalDebito-$request->debito;
                $trans->totalDebito=$preTotal;
            }*/
        }
        $diferencia=$trans->diferencia = $trans->total_credito-$trans->total_credito;
        //dd($request->all());
        $trans->update();
        if ($diferencia!=0){
            Session::flash('messageMalo', 'Verifica que tus cambios de credito o debito sea para un total de 0');
            return back();
        }else {
            Session::flash('message', 'La plantilla se edito con exito');
            return back();
        }
    }

    public function printTrans($id)
    {

        $trasacciones=DB::table('transacciones')
            ->leftJoin('personas', 'transacciones.tercero_id', '=', 'personas.id')
            ->leftJoin('personas_empleados', 'personas.natural_id', '=', 'personas_empleados.id')
            ->leftJoin('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->leftJoin('personas_naturales', 'personas.empleado_id', '=', 'personas_naturales.id')
            ->leftJoin('comprobantes', 'transacciones.comprobante_id', '=', 'comprobantes.id')
            ->select('transacciones.id','transacciones.anio','transacciones.mes','transacciones.dia',
                'personas_empleados.numeroDocumento','personas_juridicas.nit','personas_naturales.numeroDocumento',
                'comprobantes.abreviatura','comprobantes.nombreSoporte','personas.nombre1','personas.nombre2',
                'personas.apellido','personas.apellido2','transacciones.detalle','transacciones.codigo_presupuesto_letras',
                'transacciones.valor_transaccion','transacciones.revelacion')
            ->where('transacciones.id','=',$id)
            ->get();
        //dd($trasacciones);
        $retenciones=DB::table('plantilla_contables')
            ->join('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->leftJoin('pucs', 'plantilla_contables.puc_id', '=', 'pucs.id')
            ->select('plantilla_contables.id','plantilla_contables.debito','plantilla_contables.credito',
                'transacciones.total_credito','transacciones.total_debito',
                'plantilla_contables.puc_id','pucs.codigo_cuenta','pucs.nombre_cuenta')
            ->where('transacciones.id','=',$id)
            ->get();
        //dd($retenciones);
        $totales=Transacciones::select('id','total_credito','total_debito')->where('id','=',$id)->get();

        $movimientoContableDos=DB::table('plantilla_contables')
            ->leftJoin('pucs', 'plantilla_contables.puc_id', '=', 'pucs.id')
            ->leftJoin('personas_juridicas', 'pucs.persona_id', '=', 'personas_juridicas.id')
            ->leftJoin('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->select('plantilla_contables.id','plantilla_contables.docReferencia','pucs.codigo_cuenta',
                'personas_juridicas.nit','transacciones.total_credito','pucs.naturaleza','pucs.nombre_cuenta','pucs.numeroCuenta',
                'plantilla_contables.credito')
            ->where('pucs.numeroCuenta','!=',null)
            ->where('pucs.naturaleza','=','Debito')
            ->where('plantilla_contables.transacciones_id','=',$id)
            ->get();
        //dd($movimientoContableDos);
        $desRet=DB::table('plantilla_contables')
            ->join('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->join('comprobantes', 'transacciones.comprobante_id', '=', 'comprobantes.id')
            ->select('comprobantes.id','plantilla_contables.id','plantilla_contables.valor_retenido','comprobantes.nombreSoporte','comprobantes.activarDescuentos')
            ->where('comprobantes.activarDescuentos','=','SI')
            ->where('transacciones.id','=',$id)
            ->get();
        //dd($desRet);


        $sumValorRetenido=DB::table('plantilla_contables')->where('transacciones_id','=',$id)->sum('valor_retenido');
        //dd($sumValorRetenido);


        //dd($data);
        return view('transacciones.print', compact('totales','trasacciones','retenciones','movimientoContableDos',
            'desRet','sumValorRetenido'));
       /* $pdf = PDF::loadView('transacciones.print',$data);
        return $pdf->download('transacciones.pfd');*/
    }

    public function generarPlantilla($id)
    {
        $trasacciones=Transacciones::findOrFail($id);
        $comprobante=Comprobante::all();
        $puc=Puc::all();
        $numDocs=Transacciones::select('numero_doc','created_at')->get();
        $terceros=Persona::with('natural','juridica','empleado')->get();
        $tipoPresupuestos = TipoPresupuesto::all();
        $plantillaRetenciones=PlantillaContable::where('transacciones_id', $id)
            ->select('id','docReferencia', 'centro_costo_id', 'debito', 'credito', 'nota')
            ->get();
        $retenciones=DB::table('retencion_descuentos','pucs','plantilla_contables')
            ->join('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            //->join('plantilla_contables', 'plantilla_contables.retencion_id', '=', 'plantilla_contables.id')
            ->select('retencion_descuentos.id','retencion_descuentos.base','retencion_descuentos.iva'
                ,'retencion_descuentos.concepto','retencion_descuentos.porcentaje','pucs.codigo_cuenta')
            ->where('retencion_descuentos.RetoDes','=',null)
            ->get();
        $descuentos=DB::table('retencion_descuentos','pucs')
            ->join('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            //->join('niffs', 'niffs.puc_id', '=', 'niffs.id')
            ->select('retencion_descuentos.id','retencion_descuentos.base','retencion_descuentos.concepto',
                'retencion_descuentos.porcentaje','pucs.codigo_cuenta')
            ->where('retencion_descuentos.RetoDes','=','DESCUENTO')
            ->get();
        return view('transacciones.plantilla',compact('comprobante','retenciones',
            'tipoPresupuestos','terceros','numDocs','descuentos','trasacciones','plantillaRetenciones','puc'));
    }

    public function editPlantilla($id)
    {
        $trasacciones=Transacciones::findOrFail($id);
        $comprobante=Comprobante::all();
        $niif=Niff::all();
        $puc=Puc::all();
        $numDocs=Transacciones::select('numero_doc','created_at')->get();
        $terceros=Persona::with('natural','juridica','empleado')->get();
        $tipoPresupuestos = TipoPresupuesto::all();
        $plantillaRetenciones=PlantillaContable::where('transacciones_id', $id)
            ->select('id','docReferencia', 'centro_costo_id', 'debito', 'credito', 'nota')
            ->get();

        $retenciones=DB::table('retencion_descuentos','pucs','plantilla_contables')
            ->join('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            //->join('plantilla_contables', 'plantilla_contables.retencion_id', '=', 'plantilla_contables.id')
            ->select('retencion_descuentos.id','retencion_descuentos.base','retencion_descuentos.iva'
                ,'retencion_descuentos.concepto','retencion_descuentos.porcentaje','pucs.codigo_cuenta')
            ->where('retencion_descuentos.RetoDes','=',null)
            ->get();
        $descuentos = DB::table('retencion_descuentos')
            ->leftJoin('pucs', 'retencion_descuentos.puc_id_retencion', '=', 'pucs.id')
            ->leftJoin('niffs', 'niffs.puc_id', '=', 'pucs.id')
            ->select('retencion_descuentos.id', 'retencion_descuentos.base', 'retencion_descuentos.concepto',
                'retencion_descuentos.porcentaje', 'pucs.codigo_cuenta', 'pucs.nombre_cuenta', 'niffs.codigoNiff', 'niffs.puc_id',
                'retencion_descuentos.activo')
            ->where('retencion_descuentos.activo', '=', 'SI')
            ->where('retencion_descuentos.RetoDes', '=', 'DESCUENTO')
            //->orWhere('niffs.puc_id', '=', null)
            //->orWhere('niffs.puc_id', '!=', null)
            ->get();
        //dd($descuentos);
        return view('transacciones.editPlantilla',compact('comprobante','retenciones',
            'tipoPresupuestos','terceros','numDocs','descuentos','trasacciones','plantillaRetenciones','niif','puc'));
    }

    public function export($id)
    {
        return Excel::download(new TransaccionesExport($id), 'PLANTILLA.xlsx');
    }

    public function import(Request $request)
    {
        //try {
            $request->hasFile('excel');
            $archivo = $request->file('excel');
            Excel::import(new TrasnsacciomImport, $archivo);
            Session::flash('message', 'Plantilla creadas con exito');
            return  back();
        /*}
        catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message', 'Error al crear plantilla, prueba nuevamente');
            return back();
        }*/
    }

    public function loadNiif ($id)
    {
        return response()->json(Niff::where('puc_id', $id)->get());
    }

    public function pucLoadPrueba($id)
    {
        $data = Puc::select('id', 'tipoCuenta_id')->where('id',$id)->get();
        //dd($data);
        return response()->json($data);
    }

    public function pucLoad()
    {
        $data = Puc::select('id','codigocuenta', 'nombrecuenta', 'tipoCuenta_id')->get();
        //dd($data);
        return response()->json($data);
    }

    public function pucLoadAjax(Request $request)
    {
        $dataTemp = DB::select("SELECT id, concat_ws ('-', codigo_cuenta, nombre_cuenta) AS full_name FROM pucs WHERE codigo_cuenta::text LIKE '$request->term%' ORDER BY id ASC");

        //dd($dataTemp);
        $dataSelect = [];
        foreach ($dataTemp as $key => $data) {
            $dataSelect[] = [
                'id' => $data->id,
                'text' => $data->full_name
            ];
        }

        return response()->json($dataSelect);
        //}
    }

    public function filterDate(Request $request)
    {
        $inicio = $request->fechaInicial;
        $fin = $request->fechaCorte;
        $datos = DB::table('transacciones')
            ->join('personas', 'transacciones.tercero_id', '=', 'personas.id')
            ->join('tipo_presupuestos', 'transacciones.tipo_presupuesto_id', '=', 'tipo_presupuestos.id')
            ->join('comprobantes', 'transacciones.comprobante_id', '=', 'comprobantes.id')
            ->select('transacciones.id', 'transacciones.anio', 'transacciones.mes', 'transacciones.dia',
                'transacciones.numero_doc', 'transacciones.valor_transaccion', 'transacciones.codigo_presupuesto_letras',
                'personas.nombre1', 'personas.nombre2', 'personas.apellido', 'personas.apellido2',
                'comprobantes.nombreSoporte', 'tipo_presupuestos.nombrePresupuesto', 'transacciones.valorBase',
                'transacciones.anio','transacciones.created_at')
            ->where('transacciones.created_at','>=', $inicio)
            ->where('transacciones.created_at','<=', $fin)
            //->whereBetween('transacciones.created_at', array($inicio, $fin))
        ->get();
        //dd($datos);
        return view('transacciones.reporteFechas',compact('datos','inicio','fin'));
    }

}
