<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Exports\SedesExport;
use App\Http\Requests\SedeRequest;
use App\Persona;
use App\Puc;
use App\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SedeController extends Controller
{

    public function index()
    {
        $anio = session('year');
        $sedes=Sede::where('anio',$anio)->get();
        return view('sedes.index',compact('sedes'));
    }

    public function create()
    {
        $personas=Persona::select('id','nombre1')
                        ->where('empleado_id','!=', NULL)
                        ->orwhere('natural_id','!=', NULL)
                        ->get();
        $puc=Puc::all();
        $empresa=Empresa::with('sede')->get();
        //dd($empresa);
        return view('sedes.create',compact('personas','puc','empresa'));
    }

    public function store(SedeRequest $request)
    {
        $sede=new Sede();
        $id=$sede->create($request->all())->id;
        //$sede->save();
        Session::flash('message','Sede registrada con exito');
        return redirect()->route('sede.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sede=Sede::find($id);
        $personas=Persona::all();
        $puc=Puc::all();
        $empresa=Empresa::with('sede')->get();
        return view('sedes.edit',compact('personas','puc','sede','empresa'));
    }

    public function update(Request $request, $id)
    {
        $sede=Sede::find($id);
        $sede->update($request->all());
        Session::flash('message','Sede Registrada con exito');
        return redirect()->route('sede.index');
    }

    public function destroy($id)
    {
        try {
            //Eliminar registro
            Sede::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, debe borrar primero las sub sedes de esta sede');
            return redirect()->route('sede.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('sede.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }

    public function excel()
    {
        return (new SedesExport)->download('sedes.xlsx');
    }
}
