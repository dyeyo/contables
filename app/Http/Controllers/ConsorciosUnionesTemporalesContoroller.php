<?php

namespace App\Http\Controllers;

use App\CiiuActividades;
use App\CiiuDescriptores;
use App\Ciudades;
use App\ClasePersona;
use App\ConsoirciosTerceros;
use App\Departamento;
use App\Dependencia;
use App\EmpresaConsorcios;
use App\EntidadBancaria;
use App\Persona;
use App\RegimenTributario;
use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ConsorciosUnionesTemporalesContoroller extends Controller
{

    public function index()
    {

        /*$consorciados=ConsoirciosTerceros::with('persona')->get();
        $persona=Persona::with('consoircios')->get();*/
        //$consorciados=ConsoirciosTerceros::with('empresa','persona')->get();
        //dd($consorciados);
        $anio = session('year');
        $consorciados = EmpresaConsorcios::with(['consorcios' => function($dp){
            $dp->select('id', 'persona_id', 'porcentaje','empresa_consorcios_id');
        }])
            ->select('id','nit', 'dv', 'raz_social', 'nomComercial')
            ->where('empresa_consorcios.anio',$anio)
            ->get();

        /*$consorciados =  DB::table('consoircios_terceros')
            ->join('empresa_consorcios', 'consoircios_terceros.empresa_consorcios_id', '=', 'consoircios_terceros.id')
            ->select('consoircios_terceros.id','consoircios_terceros.porcentaje','empresa_consorcios.anio',
                'empresa_consorcios.nit','empresa_consorcios.raz_social')
            //->where('empresa_consorcios.anio',$anio)
            ->get();*/
        //dd($consorciados);
        return view('terceros.consorcios.index',compact('consorciados'));
    }


    public function create()
    {
        $personas=Persona::where('empleado_id','=',null)->get();
        $tipoDoc=TipoDocumento::all();
        $dependencias=Dependencia::all();
        $claseP=ClasePersona::all();
        $regimenTribuario=RegimenTributario::all();
        $departamentos=Departamento::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $actividadesCiiu=CiiuActividades::all();
        $entidadBancaria=EntidadBancaria::all();
        $ciudad=Ciudades::all();
        //dd($personas);
        return view('terceros.consorcios.create',compact('personas','regimenTribuario','descriptoresnCiiu'
            ,'departamentos','actividadesCiiu','ciudad','entidadBancaria','tipoDoc','dependencias','claseP'));
    }

    public function store(Request $request)
    {
        $empresa =  new EmpresaConsorcios();
        $empresa -> nombre1=$request->nombre1;
        $empresa -> nombre2=$request->nombre2;
        $empresa -> apellido=$request->apellido;
        $empresa -> apellido2=$request->apellido2;
        $empresa -> direccion=$request->direccion;
        $empresa -> telefono=$request->telefono;
        $empresa -> celular=$request->celular;
        $empresa -> correo=$request->correo;
        $empresa -> responsableIVA=$request->responsableIVA;
        $empresa -> pais="COLOMBIA";
        $empresa -> nit=$request->nit;
        $empresa -> dv=$request->dv;
        $empresa -> raz_social=$request->raz_social;
        $empresa -> nomComercial=$request->nomComercial;
        $empresa -> anio=$request->anio;
        $empresa -> responsableIVA=$request->responsableIVA;
        $empresa -> regimenSimple=$request->regimenSimple;
        $empresa -> autoRetenedor=$request->autoRetenedor;
        $empresa -> TipocuentaBancaria=$request->TipocuentaBancaria;
        $empresa -> numeroCuenta=$request->numeroCuenta;
        $empresa -> estadoCuenta=$request->estadoCuenta;
        $empresa -> id_regimenTributario=$request->id_regimenTributario;
        $empresa -> id_actividadesCiiu=$request->id_actividadesCiiu;
        $empresa -> ciudad_id=$request->ciudad_id;
        $empresa -> idDepartamento=$request->idDepartamento;
        $empresa -> descritores_id=$request->descritores_id;
        $empresa -> entidadBancaria_id=$request->entidadBancaria_id;
        $empresa->save();
        //dd($empresa);

        $persona = $request->persona_id;
        //$terceros = new ConsoirciosTerceros();
        foreach($persona as $key => $value) {
            $empresa->consorcios()->create([
                'persona_id' => $request->persona_id[$key],
                'porcentaje' => $request->porcentaje[$key],
            ]);
        }

        return redirect()->route('consorciados.index');
    }

    public function edit($id)
    {
        $consorcio=EmpresaConsorcios::with('consorcios')->findOrFail($id);
        $personas=Persona::all();
        $tipoDoc=TipoDocumento::all();
        $dependencias=Dependencia::all();
        $claseP=ClasePersona::all();
        $regimenTribuario=RegimenTributario::all();
        $departamentos=Departamento::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $actividadesCiiu=CiiuActividades::all();
        $entidadBancaria=EntidadBancaria::all();
        $ciudades=Ciudades::all();
        //dd($consorcio);
        return view('terceros.consorcios.edit',compact('consorcio','personas','regimenTribuario','descriptoresnCiiu'
            ,'departamentos','actividadesCiiu','ciudades','entidadBancaria','tipoDoc','dependencias','claseP'));
    }

    public function update(Request $request, $id)
    {
        $empresaconsorcio=EmpresaConsorcios::findOrFail($id);
        $empresaconsorcio -> nombre1=$request->nombre1;
        $empresaconsorcio -> nombre2=$request->nombre2;
        $empresaconsorcio -> apellido=$request->apellido;
        $empresaconsorcio -> apellido2=$request->apellido2;
        $empresaconsorcio -> direccion=$request->direccion;
        $empresaconsorcio -> telefono=$request->telefono;
        $empresaconsorcio -> celular=$request->celular;
        $empresaconsorcio -> correo=$request->correo;
        $empresaconsorcio -> responsableIVA=$request->responsableIVA;
        $empresaconsorcio -> pais="COLOMBIA";
        $empresaconsorcio -> nit=$request->nit;
        $empresaconsorcio -> dv=$request->dv;
        $empresaconsorcio -> raz_social=$request->raz_social;
        $empresaconsorcio -> nomComercial=$request->nomComercial;
        $empresaconsorcio -> responsableIVA=$request->responsableIVA;
        $empresaconsorcio -> regimenSimple=$request->regimenSimple;
        $empresaconsorcio -> autoRetenedor=$request->autoRetenedor;
        $empresaconsorcio -> TipocuentaBancaria=$request->TipocuentaBancaria;
        $empresaconsorcio -> numeroCuenta=$request->numeroCuenta;
        $empresaconsorcio -> estadoCuenta=$request->estadoCuenta;
        $empresaconsorcio -> id_regimenTributario=$request->id_regimenTributario;
        $empresaconsorcio -> anio=$request->anio;
        $empresaconsorcio -> id_actividadesCiiu=$request->id_actividadesCiiu;
        $empresaconsorcio -> ciudad_id=$request->ciudad_id;
        $empresaconsorcio -> idDepartamento=$request->idDepartamento;
        $empresaconsorcio -> descritores_id=$request->descritores_id;
        $empresaconsorcio -> entidadBancaria_id=$request->entidadBancaria_id;
        $empresaconsorcio -> save();
        if ($request->persona_id){
            $con = $request->persona_id;
            foreach($con as $key => $value) {
                $empresaconsorcio->consorcios()->create([
                    'persona_id' => $request->persona_id[$key],
                    'porcentaje' => $request->porcentaje[$key],
                ]);
            }
        }

        Session::flash('message', 'El registro se edito con exito');
        return redirect()->route('consorciados.index');

    }

    public function destroy($id)
    {
        $consorcio = ConsoirciosTerceros::find($id);
        $consorcio->delete();
        Session::flash('message', 'El tercero se elimino con exito');
        return redirect()->route('consorciados.index');
    }
    public function destroyEmpresa($id)
    {
        $consorcio=EmpresaConsorcios::findOrFail($id);
        $consorcio->delete();
        Session::flash('message', 'La empresa se elimino con exito');
        return redirect()->route('consorciados.index');
    }
    public function editPorcetaje(Request $request, $id)
    {
        $consorcio=ConsoirciosTerceros::findOrFail($id);
        //dd($request->porcentaje);
        $consorcio -> porcentaje=$request->porcentaje;
        $consorcio -> save();
        Session::flash('message', 'El registro se edito con exito');
        return redirect()->route('consorciados.index');
    }
}
