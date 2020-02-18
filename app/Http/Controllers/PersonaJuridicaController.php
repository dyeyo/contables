<?php

namespace App\Http\Controllers;

use App\CiiuActividades;
use App\CiiuDescriptores;
use App\Ciudades;
use App\ClasePersona;
use App\ConsorciosUnionesTemporales;
use App\Departamento;
use App\Dependencia;
use App\EntidadBancaria;
use App\Exports\PersonaJuridicaExport;
use App\Http\Requests\PersonaJuridicaRequest;
use App\Persona;
use App\PersonasEmpleados;
use App\PersonasJuridicas;
use App\PersonasNaturales;
use App\RegimenTributario;
use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel;

class PersonaJuridicaController extends Controller
{

    public function index()
    {
        $anio = session('year');
        $personaJuridica=DB::table('personas')
                           ->join('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
                           ->join('regimen_tributarios', 'regimen_tributarios.id', '=', 'personas_juridicas.id_regimenTributario')
                           ->select('personas_juridicas.id','personas_juridicas.nit','personas_juridicas.numeroCuenta',
                               'personas.responsableIVA','personas_juridicas.dv','personas_juridicas.banco','personas.raz_social',
                                'regimen_tributarios.nombre','personas.id','personas.nombre2','personas.nombre1','personas.apellido2','personas.apellido')
                           ->where('anio',$anio)
                           ->get();

        //dd($personaJuridica);
        return view('terceros.juridicas.index',compact('personaJuridica'));
    }

    public function create()
    {

        $tipoDoc=TipoDocumento::all();
        $dependencias=Dependencia::all();
        $claseP=ClasePersona::all();
        $regimenTribuario=RegimenTributario::all();
        //LLAMAS A LOS 2 MODELOS QUE QUIERES HACER EL SELCET PREVIAMENTE RELACIONADOS
        $departamentos=Departamento::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $actividadesCiiu=CiiuActividades::all();
        $entidadBancaria=EntidadBancaria::all();
        //LLAMAS A LOS 2 MODELOS QUE QUIERES HACER EL SELCET PREVIAMENTE RELACIONADOS
        $ciudad=Ciudades::all();

        return view('terceros.juridicas.create',compact('regimenTribuario','descriptoresnCiiu'
        ,'departamentos','actividadesCiiu','ciudad','entidadBancaria','tipoDoc','dependencias','claseP'));

    }

    public function store(Request $request)
    {
        //Persona::create($request->all());
        $p= new Persona();
        $p->nombre1=$request->nombre1;
        $p->nombre2=$request->nombre2;
        $p->apellido=$request->apellido;
        $p->apellido2=$request->apellido2;
        $p->direccion=$request->direccion;
        $p->telefono=$request->telefono;
        $p->celular=$request->celular;
        $p->raz_social=$request->raz_social;
        $p->correo=$request->correo;
        $p->anio=$request->anio;
        $p->responsableIVA=$request->responsableIVA;
        $p->regimenSimple=$request->regimenSimple;

            if ($request->tipoPersona == '2'){
            //dd($request->dv);
            $data2 = $request->validate([
                'nit' => 'required|unique:personas_juridicas',
                'dv'=>'required',
                'nomComercial'=>'nullable',
                'autoRetenedor'=>'nullable',
                'banco'=>'nullable',
                'id_regimenTributario'=>'nullable',
                'id_actividadesCiiu'=>'nullable',
                'ciudad_id'=>'nullable',
                'idDepartamento'=>'nullable',
                'descritores_id'=>'nullable',
                'entidadBancaria_id'=>'nullable',
                'numeroCuenta'=>'nullable|numeric',
                'estadoCuenta'=>'nullable',
                'TipocuentaBancaria'=>'nullable',
            ]);
            //dd($data2);

            $personajuridica=PersonasJuridicas::create($data2);
            $p->juridica_id=$personajuridica->id;
            //dd($p);
            $p->save();
            Session::flash('message','Persona Juridica registra con exito');
            return redirect()->route('personaJuridica.index');
        }
    }

    public function show($id)
    {
        $personajuridica=PersonasJuridicas::find($id);
        $regimenTribuario=RegimenTributario::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $actividadCiiu=CiiuActividades::all();
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        $entidadBancaria=EntidadBancaria::all();


        return view('terceros.juridicas.show',compact('personajuridica','regimenTribuario','descriptoresnCiiu',
            'departamentos','actividadCiiu','ciudades','entidadBancaria'));
    }

    public function edit($id)
    {
        $personajuridica = Persona::with('juridica')->findOrFail($id);
        //$personajuridica = PersonasJuridicas::findOrFail($id);
        //$personajuridica = PersonasJuridicas::findOrFail($id);
        $regimenTribuario=RegimenTributario::all();
        $actividadesCiiu=CiiuActividades::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        $entidadBancaria=EntidadBancaria::all();
        //dd($personajuridica);
        return view('terceros.juridicas.edit',compact('personajuridica','regimenTribuario','descriptoresnCiiu',
            'departamentos','ciudades','actividadesCiiu','entidadBancaria'));
    }

    public function update(Request $request, $id)
    {
        $personas = Persona::findOrFail($id);
        $personas->nombre1=$request->nombre1;
        $personas->nombre2=$request->nombre2;
        $personas->apellido=$request->apellido;
        $personas->apellido2=$request->apellido2;
        $personas->direccion=$request->direccion;
        $personas->telefono=$request->telefono;
        $personas->celular=$request->celular;
        $personas->raz_social=$request->raz_social;
        $personas->correo=$request->correo;
        $personas->responsableIVA=$request->responsableIVA;
        $personas->regimenSimple=$request->regimenSimple;
        $personas->anio=$request->anio;
        $personas->pais = 'COLOMBIA';
        $personas->update();
        $idJ=$personas->juridica_id;
        $personasJuridica= PersonasJuridicas::findOrFail($idJ);
        $personasJuridica->nit= $request->nit;
        $personasJuridica->dv= $request->dv;
        //$personasJuridica->raz_social= $request->raz_social;
        $personasJuridica->nomComercial= $request->nomComercial;
        $personasJuridica->autoRetenedor= $request->autoRetenedor;
        $personasJuridica->banco= $request->banco;
        $personasJuridica->TipocuentaBancaria= $request->TipocuentaBancaria;
        $personasJuridica->numeroCuenta= $request->numeroCuenta;
        $personasJuridica->estadoCuenta= $request->estadoCuenta;
//        $personasJuridica->tipoPersona= $request->tipoPersona;
        $personasJuridica->id_regimenTributario= $request->id_regimenTributario;
        $personasJuridica->id_actividadesCiiu= $request->id_actividadesCiiu;
        $personasJuridica->ciudad_id= $request->ciudad_id;
        $personasJuridica->idDepartamento= $request->idDepartamento;
        $personasJuridica->descritores_id= $request->descritores_id;
        $personasJuridica->entidadBancaria_id= $request->entidadBancaria_id;
        $personasJuridica->save();

        Session::flash('message', 'El registro se edito con exito');
        return redirect()->route('personaJuridica.index');
    }

    public function destroy($id)
    {
        try{
            $juridica = Persona::find($id);
            $juridica->juridica()->delete();
            $juridica->delete();
        }catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','El registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('personaJuridica.edit',$id);
        }
        //Retornar vista
        return redirect()->route('personaJuridica.index')->with('message', 'Eliminado correctamente');
    }

    public function exportPersonasJuricas(){

       // $excel=new PersonaJuridicaExport;
            return (new PersonaJuridicaExport)->download('PersonasJuridicas.xlsx');

    }

}
