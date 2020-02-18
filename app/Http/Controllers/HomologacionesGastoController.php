<?php

namespace App\Http\Controllers;

use App\CentroGasto;
use App\Exports\HomologacionesGastoExport;
use App\HomologacionGasto;
use App\Imports\HomologacionesGastoImport;
use App\TipoCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;


class HomologacionesGastoController extends Controller
{
    public function index()
    {
        $anio = session('year');
        $homologacion = HomologacionGasto::with(['presupuesto_gasto' => function($presupuesto_gasto){
            $presupuesto_gasto->select('id','codigo_presupuestal','nombre_rubro');
        }])

            ->select('id','codigo_presupuestal_hom','nombre_rubro_hom','presupuesto_gasto_id','anio')
            ->where('anio',$anio)
            ->orderBy('id','ASC')
            ->get();
        //dd($homologacion);

        return view('presupuestoGasto.homologaciones.index', compact('homologacion'));
    }

    public function edit($id)
    {
        $homologacion=HomologacionGasto::findOrfail($id);
        $presupuesto_gasto=CentroGasto::all();
        $tipoCuentas=TipoCuenta::all();
        return view('presupuestoGasto.homologaciones.edit',compact('homologacion','presupuesto_gasto','tipoCuentas'));
    }

    public function update(Request $request, $id)
    {
        $homologacion=HomologacionGasto::findOrfail($id);
        $homologacion->update($request->all());
        Session::flash('message','Cuenta Editada con éxito');
        return redirect()->route('homologacion_gasto.index');
    }

    public function destroy($id)
    {
        $homologacion=HomologacionGasto::findOrfail($id);
        $homologacion->delete();
        Session::flash('message','Cuenta Eliminada con éxito');
        return redirect()->route('homologacion_gasto.index');
    }

    public function export()
    {
        //return (new NiffExport)->download('NIF.xlsx');
        return Excel::download(new HomologacionesGastoExport(),'Homologaciones_Gastos.xlsx');
    }

    public function import(Request $request)
    {
        try {
        DB::table('homologacion_gasto')->truncate();
        $request->hasFile('excel');
        $archivo = $request->file('excel');
        Excel::import(new HomologacionesGastoImport, $archivo);
        return  redirect()->route('homologacion_gasto.index')->with('message', 'Presupuesto de Gasto Homologado Correctamente');
        }
         catch (\Illuminate\Database\QueryException $e) {
             Session::flash('message','Ocurrio un error, verificque si se elimino previamente las filas 1 a la 11 de su excel');
             return redirect()->route('homologacion_gasto.index');
         }
    }
}
