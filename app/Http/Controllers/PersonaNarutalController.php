<?php

namespace App\Http\Controllers;

use App\CiiuActividades;
use App\CiiuDescriptores;
use App\Ciudades;
use App\ClasePersona;
use App\Departamento;
use App\Dependencia;
use App\EntidadBancaria;
use App\Exports\PersonaNaturalesExport;
use App\Imports\PersonasImport;
use App\Persona;
use App\PersonasNaturales;
use App\RegimenTributario;
use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PersonaNarutalController extends Controller
{

    public function index()
    {
        $anio = session('year');
        $personasNaturales = DB::table('personas')
                            ->join('personas_naturales', 'personas.natural_id', '=', 'personas_naturales.id')
                            ->select('personas_naturales.id','personas_naturales.numeroDocumento','personas.anio',
                                'personas.responsableIVA', 'personas.id','personas.nombre2','personas.nombre1',
                                'personas.apellido2','personas.apellido','personas.direccion','personas.regimenSimple',
                                'personas_naturales.numeroCuenta','personas.telefono','personas.celular','personas.correo')
                            ->where('personas.anio',$anio)
                            ->get();
        //dd($personasNaturales);
       return view('terceros.naturales.index',compact('personasNaturales'));
    }

    public function create()
    {
        $regimenTribuario=RegimenTributario::all();
        $tipoDoc=TipoDocumento::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $actividadesCiiu=CiiuActividades::all();
        $dependencias=Dependencia::all();
        $departamentos=Departamento::all();
        $ciudad=Ciudades::all();
        $claseP=ClasePersona::all();
        $entidadBancaria=EntidadBancaria::all();
        return view('terceros.naturales.create', compact('departamentos',
            'claseP','descriptoresnCiiu','tipoDoc','ciudad','actividadesCiiu','dependencias','entidadBancaria',
            'regimenTribuario'));
    }

    public function store(Request $request)
    {

        $p= new Persona();
        $p->nombre1=$request->nombre1;
        $p->nombre2=$request->nombre2;
        $p->apellido=$request->apellido;
        $p->apellido2=$request->apellido2;
        $p->direccion=$request->direccion;
        $p->telefono=$request->telefono;
        $p->celular=$request->celular;
        $p->correo=$request->correo;
        $p->responsableIVA=$request->responsableIVA;
        $p->regimenSimple=$request->regimenSimple;
        $p->anio=$request->anio;
        if($request->tipoPersona == '2')
        {
            $data2 = $request->validate([
                'numeroDocumento' => 'required|unique:personas_naturales',
                'Subclase'=>'nullable',
                'designadoSupervisor'=>'nullable',
                'TipocuentaBancaria'=>'nullable',
                'numeroCuenta'=>'nullable',
                'estadoCuenta'=>'nullable',
                'id_tipoDocumento'=>'nullable',
                'id_clase'=>'nullable',
                'id_actividadesCiiu'=>'nullable',
                'descritores_id'=>'nullable',
                'ciudad_id'=>'nullable',
                'idDepartamento'=>'nullable',
                'entidadBancaria_id'=>'nullable|numeric',
                'dependencia_id'=>'nullable',
                'tipoPersona'=>'nullable',

            ]);

            $personanatural=PersonasNaturales::create($data2);
            $p->natural_id=$personanatural->id;
            $p->save();
            Session::flash('message','Persona Natural registra con exito');
            return redirect()->route('personaNarutal.index');

        }

    }

    public function show($id)
    {
        $personaNatural=PersonasNaturales::find($id);
        $descriptoresnCiiu=CiiuDescriptores::all();
        $tipoDoc = TipoDocumento::all();
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        $claseP=ClasePersona::all();
        $dependencias=Dependencia::all();
        $actividadesCiiu=CiiuActividades::all();
        $entidadBancaria=EntidadBancaria::all();

        return view('terceros.naturales.show',compact('personaNatural','tipoDoc','descriptoresnCiiu',
            'departamentos','claseP','ciudades','actividadesCiiu','dependencias','entidadBancaria'));
    }

    public function edit($id)
    {
        $personaNatural = Persona::with('natural')->findOrFail($id);
        $descriptoresnCiiu=CiiuDescriptores::all();
        $tipoDoc = TipoDocumento::all();
        $departamentos=Departamento::all();
        $claseP=ClasePersona::all();
        $ciudades=Ciudades::all();
        $dependencias=Dependencia::all();
        $actividadesCiiu=CiiuActividades::all();
        $entidadBancaria=EntidadBancaria::all();
        //dd($personaNatural);
        return view('terceros.naturales.edit',compact('personaNatural','tipoDoc','descriptoresnCiiu',
            'departamentos','claseP','actividadesCiiu','ciudades','dependencias','entidadBancaria'));
    }

    public function update(Request $request, $id)
    {
        $personas= Persona::findOrFail($id);
        $personas->nombre1=$request->nombre1;
        $personas->nombre2=$request->nombre2;
        $personas->apellido=$request->apellido;
        $personas->apellido2=$request->apellido2;
        $personas->direccion=$request->direccion;
        $personas->telefono=$request->telefono;
        $personas->celular=$request->celular;
        $personas->correo=$request->correo;
        $personas->anio=$request->anio;
        $personas->pais = 'COLOMBIA';
        $personas->responsableIVA=$request->responsableIVA;
        $personas->regimenSimple=$request->regimenSimple;
        $personas->pesonaNatural=$request->pesonaNatural;
        //dd($personas);
        $personas->update();
        $idN=$personas->natural_id;
        $personasNaturales = PersonasNaturales::findOrFail($idN);
        $personasNaturales->numeroDocumento=$request->numeroDocumento;
        $personasNaturales->Subclase=$request->Subclase;
        $personasNaturales->designadoSupervisor=$request->designadoSupervisor;
        $personasNaturales->TipocuentaBancaria=$request->TipocuentaBancaria;
        $personasNaturales->numeroCuenta=$request->numeroCuenta;
        $personasNaturales->estadoCuenta=$request->estadoCuenta;
        $personasNaturales->id_tipoDocumento=$request->id_tipoDocumento;
        $personasNaturales->id_clase=$request->id_clase;
        $personasNaturales->id_actividadesCiiu=$request->id_actividadesCiiu;
        $personasNaturales->descritores_id=$request->descritores_id;
        $personasNaturales->ciudad_id=$request->ciudad_id;
        $personasNaturales->idDepartamento=$request->idDepartamento;
        $personasNaturales->entidadBancaria_id=$request->entidadBancaria_id;
        $personasNaturales->dependencia_id=$request->dependencia_id;
        $personasNaturales->tipoPersona=$request->tipoPersona;
        //dd($personasNaturales);
        $personasNaturales->update();

        Session::flash('message','El registro se edito con exito');
        return redirect()->route('personaNarutal.index');
    }

    public function destroy($id)
    {
       try {
//            //Eliminar registro
           //Persona::with('natural')->find($id)->delete();
               $natural= Persona::find($id);
               $natural->natural()->delete();
               $natural->delete();
       }
        catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('personaEmpleado.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        return redirect()->route('personaNarutal.index')->with('message', 'Eliminado correctamente');
    }

    public function exportPersonasNatural()
    {
        return (new PersonaNaturalesExport)->download('Personas_Naturales.xlsx');
    }

    public function import(Request $request)
    {
        try {
            $request->hasFile('excel');
            $archivo = $request->file('excel');
            Excel::import(new PersonasImport, $archivo);
            return  redirect()->route('personaNarutal.index')->with('message', 'Personas Naturales Subidas Correctamente');

        }
        catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','Un número de Documento ya fue registrado y no puede estar duplicado por favor verifica tu excel.');
            return redirect()->route('personaNarutal.index');
        }

    }

    public function download()
    {
        $file= public_path(). "/files/PERSONAS_NATURALES-PLANTILLA.xlsx";

        $headers = [
            'Content-Type' => 'application/xlsx',
        ];

        return response()->download($file, 'PERSONAS_NATURALES-PLANTILLA.xlsx', $headers);
    }
}
