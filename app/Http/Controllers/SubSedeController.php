<?php

namespace App\Http\Controllers;

use App\Exports\SubSedesExport;
use App\Http\Requests\SubSedeRequest;
use App\Persona;
use App\Puc;
use App\Sede;
use App\SubSede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubSedeController extends Controller
{
    public function index()
    {
        $anio = session('year');
        $subsede=SubSede::where('anio',$anio)->get();
        return view('subSede.index',compact('subsede'));
    }

    public function create()
    {
        $personas=Persona::select('id','nombre1')
                        ->where('empleado_id','!=', NULL)
                        ->orwhere('natural_id','!=', NULL)
                        ->get();
        //dd($personas);
        $puc=Puc::all();
        $sede=Sede::all();
        //dd($empresa);
        return view('subSede.create',compact('personas','puc','sede'));
    }

    public function store(SubSedeRequest $request)
    {
        $subsede=new SubSede();
        $subsede->create($request->all());
        //$sede->save();
        Session::flash('message','Sede registrada con exito');
        return redirect()->route('subSede.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $subsede=SubSede::find($id);
        $personas=Persona::select('id','nombre1')
            ->where('empleado_id','!=', NULL)
            ->orwhere('natural_id','!=', NULL)
            ->get();
        $puc=Puc::all();
        $sede=Sede::all();
        //dd($subsede);
        return view('subSede.edit',compact('personas','puc','subsede','sede'));
    }

    public function update(Request $request, $id)
    {
        $sede=SubSede::find($id);
        $sede->update($request->all());
        Session::flash('message','Sede editada con exito');
        return redirect()->route('subSede.index');
    }

    public function destroy($id)
    {
        $subSede=SubSede::find($id);
        $subSede->delete();
        Session::flash('message','SubSede Eliminada con exito');
        return redirect()->route('subSede.index');
    }

    public function excel()
    {
        return (new SubSedesExport)->download('Sub_Sedes.xlsx');
    }
}
