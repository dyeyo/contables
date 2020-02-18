<?php

namespace App\Http\Controllers;

use App\conceptoDianExogeno;
use App\CuentaMaesta;
use App\Exports\NiffExport;
use App\formatoDianExogeno;
use App\Imports\NiffImport;
use App\Niff;
use App\PrivilegiosPUC;
use App\Puc;
use App\TipoCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class NiffController extends Controller
{
    public function index()
    {
        $anio = session('year');
        $niif = Niff::with(['puc' => function($puc){
            $puc->select('id','codigo_cuenta','nombre_cuenta');
        }])

            ->select('id','codigoNiff','nombreNiff','puc_id','anio')
            ->where('anio',$anio)
            ->orderBy('id','ASC')
            ->get();
        //dd($niff);

        return view('niffs.index', compact('niif'));
    }

    public function edit($id)
    {
        $niif=Niff::findOrfail($id);
        $pucs=Puc::all();
        $concepto=conceptoDianExogeno::all();
        $formato=formatoDianExogeno::all();
        $privilegios=PrivilegiosPUC::all();
        $tipoCuentas=TipoCuenta::all();
        return view('niffs.edit',compact('niif','pucs','concepto','formato',
            'privilegios','tipoCuentas'));
    }

    public function update(Request $request, $id)
    {
        $niif=Niff::findOrfail($id);
        $niif->update($request->all());
        Session::flash('message','Cuenta Editada con éxito');
        return redirect()->route('niff.index');
    }

    public function destroy($id)
    {
       $niif=Niff::findOrfail($id);
       $niif->delete();
        Session::flash('message','Cuenta Eliminada con éxito');
        return redirect()->route('niff.index');
    }

    public function exportniff()
    {
        //return (new NiffExport)->download('NIF.xlsx');
        return Excel::download(new NiffExport(),'NIF.xlsx');
    }

    public function import(Request $request)
    {
        //try {
            //DB::table('niffs')->truncate();
            $request->hasFile('excel');
            $archivo = $request->file('excel');
            Excel::import(new NiffImport, $archivo);
            return  redirect()->route('niff.index')->with('message', 'Cuentas NIIF Creadas Correctamente');
       /* }
        catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','Ocurrio un error, verificque si se elimino previamente las filas 1, 2 y 3 de su excel');
            return redirect()->route('niff.index');
        }*/
    }

}
