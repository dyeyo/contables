<?php

namespace App\Http\Controllers;

use App\CentroGasto;
use App\CreditosGastos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CreditosGastosController extends Controller
{
    public function index()
    {
        $anio = session('year');
        $creditos = DB::table('creditos_gastos')
            ->join('presupuesto_gasto', 'creditos_gastos.id_presupuesto', '=', 'presupuesto_gasto.id')
            ->select('creditos_gastos.id','creditos_gastos.fecha','creditos_gastos.anio',
                'creditos_gastos.valor', 'creditos_gastos.id_presupuesto','creditos_gastos.numero_administrativo',
                'presupuesto_gasto.codigo_presupuestal', 'presupuesto_gasto.nombre_rubro')
            ->where('creditos_gastos.anio',$anio)
            ->get();
        //dd($creditos);
        return view('presupuestoGasto.creditos.index', compact('creditos'));
    }

    public function create()
    {
        $presupuesto_gasto = CentroGasto::all();
        return view('presupuestoGasto.creditos.create', compact('presupuesto_gasto'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $creditos = new CreditosGastos();
        $creditos->valor=$request->valor;
        $creditos->fecha=$request->fecha;
        $creditos->acto_administrativo=$request->acto_administrativo;
        $creditos->detalle=$request->detalle;
        $creditos->anio=$request->anio;
        $creditos->numero_administrativo=$request->numero_administrativo;
        $creditos->id_presupuesto=$request->id_presupuesto;
        $creditos->save();
        $valor = CentroGasto::find($request['id_presupuesto']);
        if ($valor->valor_definitivo==0){
            $valor->valor_definitivo = $request->apropiacion_inical+$request->valor;
        }else {
            $valor->valor_definitivo = $valor->valor_definitivo+$request->valor;
        }
        $valor->update();
        Session::flash('message','Credito Creado con éxito');
        return redirect()->route('creditos_presupuesto_gasto.index');

    }

    public function edit($id)
    {
        $creditos=CreditosGastos::findOrFail($id);
        //dd($creditos);
        $presupuesto_gasto = CentroGasto::all();
        return view('presupuestoGasto.creditos.edit', compact('creditos','presupuesto_gasto'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $creditos=CreditosGastos::findOrFail($id);
        $valorActual= $creditos->valor;
        $valorNuevo= $request->valor;
        if ($valorActual == $valorNuevo){
            //dd('igual');
            $creditos->fecha=$request->fecha;
            $creditos->valor=$request->valor;
            $creditos->acto_administrativo=$request->acto_administrativo;
            $creditos->detalle=$request->detalle;
            $creditos->anio=$request->anio;
            $creditos->numero_administrativo=$request->numero_administrativo;
            $creditos->id_presupuesto=$request->id_presupuesto;
            $creditos->update();
        }else{
            //dd('Noigual');
            $creditos->fecha=$request->fecha;
            $creditos->valor=$request->valor;
            $creditos->acto_administrativo=$request->acto_administrativo;
            $creditos->detalle=$request->detalle;
            $creditos->anio=$request->anio;
            $creditos->numero_administrativo=$request->numero_administrativo;
            $creditos->id_presupuesto=$request->id_presupuesto;
            $creditos->update();
            $valor = CentroGasto::find($request['id_presupuesto']);
            if ($valor->valor_definitivo==0){
                $valor->valor_definitivo = $request->apropiacion_inical+$request->valor;
            }else {
                $valor->valor_definitivo = $valor->valor_definitivo+$request->valor;
            }
            $valor->update();
        }
        Session::flash('message','Credito Editado con éxito');
        return redirect()->route('creditos_presupuesto_gasto.index');
    }

    public function destroy(Request $request,$id)
    {

        $creditos=CreditosGastos::find($id);
        $valor = CentroGasto::find($request['id_presupuesto']);
        $valor->valor_definitivo -= $request->valor;
        $valor->update();
        $creditos->delete();
        Session::flash('message','Credito Eliminado con éxito');

        return redirect()->route('creditos_presupuesto_gasto.index');
    }
}
