<?php

namespace App\Http\Controllers;

use App\AmbitosyBienes;
use App\Dependencia;
use App\Empresa;
use App\Http\Requests\DependeciaRequest;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DependenciasController extends Controller
{



    public function index()
    {
        $anio = session('year');
        $dependecias=Dependencia::where('anio',$anio)->get();
        //$empresa=Empresa::select('nombre','logo_plandesarrollo')->get();
        //dd($empresa);
        return view('dependencias.index',compact('dependecias'));
    }


    public function create()
    {
        $terceros=Persona::select('id','nombre1', 'nombre2', 'apellido', 'apellido2')->where('juridica_id','=',null)->get();
        //dd($terceros);
        //$dependencias=Dependencia::all();
        return view('dependencias.create',compact('terceros'));
    }


    public function store(DependeciaRequest $request)
    {
        $dependecias = Dependencia::create($request->all());
       // dd($dependecias);
        if ($dependecias) {
            Session::flash('message','El registro se creo con exito');
            return redirect()->route('dependecias.index');
        } else {
            return view('dependencias.create');
        }
    }


    public function show($id)
    {
        $dependecias=Dependencia::find($id);
        $ambitoServices=AmbitosyBienes::all();
        return view('dependencias.show',compact('dependecias','ambitoServices'));
    }

    public function edit($id)
    {
        $dependecias=Dependencia::find($id);
        $ambitoServices=AmbitosyBienes::all();
        $terceros=Persona::select('id','nombre1', 'nombre2', 'apellido', 'apellido2')->where('juridica_id','=',null)->get();
        //dd($terceros);
        /*  return view('terceros.naturales.edit', compact('personaNatural','departamentos',
              'claseP','descriptoresnCiiu','tipoDoc'));*/
        return view('dependencias.edit',compact('dependecias','ambitoServices','terceros'));
    }

    public function update(Request $request, $id)
    {
        $dependecias= Dependencia::find($id);
        $dependecias->codigo= $request->codigo;
        $dependecias->nombre= $request->nombre;
        $dependecias->anio= $request->anio;
        $dependecias->persona_id= $request->persona_id;
        //dd($personasNaturales);
        Session::flash('message','El registro se edito con exito');
        $dependecias->save();

        return redirect()->route('dependecias.index');

    }


    public function destroy($id)
    {
        try {

            Dependencia::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','El registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('dependecias.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','El registro se elimino con exito');
        return redirect()->route('dependecias.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }

}
