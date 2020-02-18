<?php

namespace App\Http\Controllers;

use App\CiiuActividades;
use App\CiiuDescriptores;
use App\Ciudades;
use App\ClasePersona;
use App\Departamento;
use App\Dependencia;
use App\PersonasEmpleados;
use App\PersonasJuridicas;
use App\PersonasNaturales;
use App\TipoDocumento;
use Illuminate\Http\Request;

class TesoreriaController extends Controller
{
    public function index()
    {
        $personasNaturales=PersonasNaturales::all();
        $personaJuridica=PersonasJuridicas::all();
        $perEmpleados=PersonasEmpleados::all();

        return view('tesoreria.index',compact('personasNaturales','personaJuridica',
            'perEmpleados'));
    }

    public function edit($id)
    {
        $personaNatural=PersonasNaturales::find($id);
        $descriptoresnCiiu=CiiuDescriptores::all();
        $tipoDoc = TipoDocumento::all();
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        $claseP=ClasePersona::all();
        $dependencias=Dependencia::all();
        $actividadesCiiu=CiiuActividades::all();

        //dd($personaNatural);
        /*  return view('terceros.naturales.edit', compact('personaNatural','departamentos',
              'claseP','descriptoresnCiiu','tipoDoc'));*/
        return view('terceros.naturales.edit',compact('personaNatural','tipoDoc','descriptoresnCiiu',
            'departamentos','claseP','actividadesCiiu','ciudades','dependencias'));
    }

    public function update(Request $request, $id)
    {
        $personasNaturales = PersonasNaturales::find($id);
        $personasNaturales->numeroDocumento = $request->numeroDocumento;
        $personasNaturales->nombre1 = $request->nombre1;
        $personasNaturales->nombre2 = $request->nombre2;
        $personasNaturales->apellido1 = $request->apellido1;
        $personasNaturales->apellido2 = $request->apellido2;
        $personasNaturales->direccion = $request->direccion;
        $personasNaturales->telefono = $request->telefono;
        $personasNaturales->celular = $request->celular;
        $personasNaturales->correo = $request->correo;
        $personasNaturales->tipoPersona = $request->tipoPersona;
        $personasNaturales->pais = 'COLOMBIA';
        $personasNaturales->Subclase = $request->Subclase;
        $personasNaturales->responsableIVA = $request->responsableIVA;
        $personasNaturales->regimenSimple = $request->regimenSimple;
        $personasNaturales->designadoSupervisor = $request->designadoSupervisor;
        $personasNaturales->id_tipoDocumento = $request->id_tipoDocumento;
        $personasNaturales->id_clase = $request->id_clase;
        $personasNaturales->id_actividadesCiiu = $request->id_actividadesCiiu;
        $personasNaturales->id_descriptorsCiiu = $request->id_descriptorsCiiu;
        $personasNaturales->idCiudad = $request->idCiudad;
        $personasNaturales->idDepartamento = $request->idDepartamento;
        //dd($personasNaturales);
        $personasNaturales->save();

        return redirect()->route('personaNarutal.index');

    }

}
