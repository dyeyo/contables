<?php

namespace App\Http\Controllers;

use App\AmbitosyBienes;
use App\Ciudades;
use App\CodigoEmpleo;
use App\ConsorciosUnionesTemporales;
use App\Departamento;
use App\Dependencia;
use App\Empresa;
use App\EntidadBancaria;
use App\Exports\PersonaEmpleadosExport;
use App\Http\Requests\PersonaEmpleadoRequest;
use App\NivelEmpleo;
use App\Persona;
use App\PersonasEmpleados;
use App\PersonasJuridicas;
use App\PersonasNaturales;
use App\TipoDocumento;
use App\TipoVinculacion;
use App\UnidadEjecutara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel;

class PersonaEmpleadoController extends Controller
{

    public function index()
    {
        $anio = session('year');
        $perEmpleados =DB::table('personas')
                        ->join('personas_empleados', 'personas.empleado_id', '=', 'personas_empleados.id')
                        ->join('codigo_empleos', 'codigo_empleos.id', '=', 'personas_empleados.codigoEmpleo_id')
                        ->join('nivel_empleos', 'nivel_empleos.id', '=', 'personas_empleados.nivelEmpleo_id')
                        ->select('personas_empleados.id','personas_empleados.designadoSupervisor','personas_empleados.numeroDocumento',
                            'codigo_empleos.nombreEmpleo','nivel_empleos.nombre','personas.id','personas.nombre2','personas.nombre1','personas.apellido2','personas.apellido','personas.anio')
                        ->where('personas.anio',$anio)
                        ->get();

       /*$perEmpleados = Persona::with(['empleado' => function($dp){
            $dp->select('id', 'numeroDocumento');
        }])
            ->select('id', 'nombre', 'nombre2', 'apellido', 'apellido2',
                'direccion', 'telefono', 'celular', 'correo', 'pais','empleado_id')
            ->get();*/

        //dd($perEmpleados);
        return view('terceros.empleados.index',compact(
            'perEmpleados'));
    }

    public function loadEmpleo ($id)
    {
        return response()->json(CodigoEmpleo::where('id_nivelEmpleo', $id)->get());
    }

    public function create()
    {
        $ambitoServices=AmbitosyBienes::all();
        $departamentos=Departamento::all();
        $tipoDoc=TipoDocumento::all();
        $ciudades=Ciudades::all();
        $nivelEmpleo=NivelEmpleo::all();
        $codEmpleo=CodigoEmpleo::all();
        $tipoVinculacion=TipoVinculacion::all();
        $unidadEje=UnidadEjecutara::all();
        $dependencia=Dependencia::all();
        $entidadBancaria=EntidadBancaria::all();
        $empresa=Empresa::with('empleado')->get();
       //$empresa=Empresa::where('marco_normativo','!=','');
       return view('terceros.empleados.create',compact('ambitoServices','departamentos','tipoDoc','nivelEmpleo',
           'codEmpleo','unidadEje','dependencia','tipoVinculacion','empresa','ciudades','entidadBancaria'));
    }


    public function store(PersonaEmpleadoRequest $request)
    {
        $p= new Persona();
        $p->nombre1=$request->nombre1;
        $p->nombre2=$request->nombre2;
        $p->apellido=$request->apellido;
        $p->apellido2=$request->apellido2;
        $p->direccion=$request->direccion;
        $p->telefono=$request->telefono;
        $p->celular=$request->celular;
        $p->anio=$request->anio;
        $p->correo=$request->correo;
        if ($request->hasFile('foto'))
        {
            $file = $request->file('foto');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $p->foto=$name;

        }
        //$p->responsableIVA=$request->responsableIVA;
        $p->regimenSimple=$request->regimenSimple;
        if ($request->tipoPersona == '3') {
            //dd($request->dv);
            $data2 = $request->validate([
                'numeroDocumento' => 'required|unique:personas_empleados',
                'gradoEmpleo' => 'nullable',
                'designadoSupervisor' => 'nullable',
                'fec_nacimiento' => 'nullable',
                'fec_vinculacion' => 'nullable',
                'ordenadorGasto' => 'nullable',
                'actoAdministrativo' => 'nullable',
                'fechaExpedicion' => 'nullable',
                'numeroActo' => 'nullable',
                'genero' => 'nullable',
                'fechaInicioAutorizacion' => 'nullable',
                'fechaFinAutorizacion' => 'nullable',
                'fechaRevocatoria' => 'nullable',
                'codigoPresupuestoDesde' => 'nullable',
                'codigoPresupuestoHasta' => 'nullable',
                'todoAbmitos' => 'nullable',
                'cuantiaHasta' => 'nullable',
                'estado' => 'nullable',
                'numeroCuenta' => 'nullable',
                'tipoPersona' => 'nullable',
                'TipocuentaBancaria' => 'nullable',
                'estadoCuenta' => 'nullable',
                'tipoDocumento_id' => 'nullable',
                'tipoVinculacion_id' => 'nullable',
                'ciudad_id' => 'nullable',
                'depatamento_id' => 'nullable',
                'entidadBancaria_id' => 'nullable',
                'nivelEmpleo_id' => 'nullable',
                'codigoEmpleo_id' => 'nullable',
                'unidadEjecutara_id' => 'nullable',
                'dependencia_id' => 'nullable',
                'empresa_id' => 'nullable',
                'id_ambitoBienesyServicios' => 'nullable',
            ]);

                $personaempleado = PersonasEmpleados::create($data2);
                $p->empleado_id = $personaempleado->id;

                $p->save();
                Session::flash('message', 'Empleado Registrado con exito');
                //$perEmpleados=PersonasEmpleados::create($request->all());
                return redirect()->route('personaEmpleado.index');

        }
    }


    public function edit($id)
    {
        $perEmpleado=Persona::with('empleado')->findOrFail($id);
        $ambitoServices=AmbitosyBienes::all();
        $departamentos=Departamento::all();
        $tipoDoc=TipoDocumento::all();
        $ciudades=Ciudades::all();
        $nivelEmpleo=NivelEmpleo::all();
        $codEmpleo=CodigoEmpleo::all();
        $tipoVinculacion=TipoVinculacion::all();
        $unidadEje=UnidadEjecutara::all();
        $dependencia=Dependencia::all();
        $entidadBancaria=EntidadBancaria::all();
        $empresa=Empresa::with('empleado')->get();
        //dd($perEmpleado);
        return view('terceros.empleados.edit',compact('perEmpleado','departamentos','tipoDoc','nivelEmpleo',
            'codEmpleo','unidadEje','dependencia','tipoVinculacion','empresa','ciudades','ambitoServices','entidadBancaria'));
    }

    public function update(Request $request, $id)
    {
        $personas=Persona::findOrFail($id);
        $personas->nombre1=$request->nombre1;
        $personas->nombre2=$request->nombre2;
        $personas->apellido=$request->apellido;
        $personas->apellido2=$request->apellido2;
        $personas->direccion=$request->direccion;
        $personas->telefono=$request->telefono;
        $personas->celular=$request->celular;
        $personas->correo=$request->correo;
        $personas->anio=$request->anio;
        $personas->responsableIVA=$request->responsableIVA;
        $personas->regimenSimple=$request->regimenSimple;
        if ($request->hasFile('foto'))
        {
            $file=$request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $personas->foto=$name;
        }
        $personas->update();
        //dd($personas);
        $idP=$personas->empleado_id;
        $perEmpleados=PersonasEmpleados::findOrFail($idP);
        $perEmpleados->numeroDocumento=$request->numeroDocumento;
        $perEmpleados->gradoEmpleo=$request->gradoEmpleo;
        $perEmpleados->designadoSupervisor=$request->designadoSupervisor;
        $perEmpleados->fec_nacimiento=$request->fec_nacimiento;
        $perEmpleados->fec_vinculacion=$request->fec_vinculacion;
        $perEmpleados->ordenadorGasto=$request->ordenadorGasto;
        $perEmpleados->actoAdministrativo=$request->actoAdministrativo;
        $perEmpleados->fechaExpedicion=$request->fechaExpedicion;
        $perEmpleados->tipoPersona=$request->tipoPersona;
        $perEmpleados->numeroActo=$request->numeroActo;
        $perEmpleados->fechaInicioAutorizacion=$request->fechaInicioAutorizacion;
        $perEmpleados->fechaFinAutorizacion=$request->fechaFinAutorizacion;
        $perEmpleados->fechaRevocatoria=$request->fechaRevocatoria;
        $perEmpleados->codigoPresupuestoDesde=$request->codigoPresupuestoDesde;
        $perEmpleados->codigoPresupuestoHasta=$request->codigoPresupuestoHasta;
        $perEmpleados->todoAbmitos=$request->todoAbmitos;
        $perEmpleados->cuantiaHasta=$request->cuantiaHasta;
        $perEmpleados->genero=$request->genero;
        $perEmpleados->estado=$request->estado;
        $perEmpleados->TipocuentaBancaria= $request->TipocuentaBancaria;
        $perEmpleados->numeroCuenta= $request->numeroCuenta;
        $perEmpleados->estadoCuenta= $request->estadoCuenta;
        $perEmpleados->tipoDocumento_id=$request->tipoDocumento_id;
        $perEmpleados->tipoVinculacion_id=$request->tipoVinculacion_id;
        $perEmpleados->ciudad_id=$request->ciudad_id;
        $perEmpleados->depatamento_id=$request->depatamento_id;
        $perEmpleados->nivelEmpleo_id=$request->nivelEmpleo_id;
        $perEmpleados->codigoEmpleo_id=$request->codigoEmpleo_id;
        $perEmpleados->id_ambitoBienesyServicios=$request->id_ambitoBienesyServicios;
        $perEmpleados->unidadEjecutara_id=$request->unidadEjecutara_id;
        $perEmpleados->dependencia_id=$request->dependencia_id;
        $perEmpleados->empresa_id=$request->empresa_id;
        $perEmpleados->entidadBancaria_id=$request->entidadBancaria_id;
        $perEmpleados->tipoPersona=$request->tipoPersona;
        $perEmpleados->update();
        //dd($perEmpleados);

        if ($perEmpleados) {
            Session::flash('message','El registro se edito con exito');
            return redirect()->route('personaEmpleado.index');
        } else {
            return redirect()->route('personaEmpleado.edit');
        }
    }

    public function destroy($id)
    {
        try {
            //Eliminar registro
            $empleado = Persona::find($id);
            $empleado->empleado()->delete();
            $empleado->delete();
            //Persona::with('empleado')->find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('personaEmpleado.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('personaEmpleado.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }

    public function exportPersonasEmpleados()
    {
        // $excel=new PersonaJuridicaExport;
        return (new PersonaEmpleadosExport)->download('Empleados.xlsx');
    }
}
