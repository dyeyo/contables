<?php

namespace App\Http\Controllers;

use App\Ciudades;
use App\Departamento;
use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function index(Request $request)
    {

        $empresa = Empresa::all();
        //dd($empresa);
        return view('empresa.index',compact('empresa'));
    }

    public function create()
    {
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        return view('empresa.create',compact('departamentos','ciudades'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $empresa=new Empresa();

        if ($request->hasFile('logo_republica') && $request->hasFile('logo_municipio') && $request->hasFile('logo_plandesarrollo'))
        {
            $file=$request->file('logo_republica');
            $name1=$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name1);
            $empresa->logo_republica=$name1;

            $file2=$request->file('logo_municipio');
            $name2=$file2->getClientOriginalName();
            $file2->move(public_path().'/images/',$name2);
            $empresa->logo_municipio=$name2;

            $file3=$request->file('logo_plandesarrollo');
            $name3=$file3->getClientOriginalName();
            $file3->move(public_path().'/images/',$name3);
            $empresa->logo_plandesarrollo=$name3;
        }

        $empresa->nombre=$request->input('nombre');
        $empresa->nit=$request->input('nit');
        $empresa->dig_verificacion=$request->input('dig_verificacion');
        $empresa->codCgn=$request->input('codCgn');
        $empresa->marco_normativo=$request->input('marco_normativo');
        $empresa->direccion=$request->input('direccion');
        $empresa->telefono=$request->input('telefono');
        $empresa->correo=$request->input('correo');
        $empresa->url=$request->input('url');
        $empresa->lema=$request->input('lema');
        $empresa->marco_normativo=$request->input('marco_normativo');

        $empresa->nombreRepresentanteLegal=$request->input('nombreRepresentanteLegal');
        $empresa->cedulaRepresentanteLegal=$request->input('cedulaRepresentanteLegal');
        $empresa->no_tp_representante_legal=$request->input('no_tp_representante_legal');
        $empresa->nombreContador=$request->input('nombreContador');
        $empresa->cedulaContador=$request->input('cedulaContador');
        $empresa->noTpContador=$request->input('noTpContador');
        $empresa->nombreRevisorFiscal=$request->input('nombreRevisorFiscal');
        $empresa->cedulaRevisorFiscal=$request->input('cedulaRevisorFiscal');
        $empresa->noTPRevisorFiscal=$request->input('noTPRevisorFiscal');
        $empresa->nombreControlInterno=$request->input('nombreControlInterno');
        $empresa->cedulaControlInterno=$request->input('cedulaControlInterno');
        $empresa->noTPControlInterno=$request->input('noTPControlInterno');
        $empresa->jefePresupuesto=$request->input('jefePresupuesto');
        $empresa->cedulaJefePresupuesto=$request->input('cedulaJefePresupuesto');
        $empresa->noTPJefePresupuesto=$request->input('noTPJefePresupuesto');
        $empresa->otroResponsable=$request->input('otroResponsable');
        $empresa->nombreOtroResponsable=$request->input('nombreOtroResponsable');
        $empresa->cedulaJefePresupuesto=$request->input('cedulaJefePresupuesto');
        $empresa->noTPOtroResponsable=$request->input('noTPOtroResponsable');

        $empresa->num_ingresoinicial=$request->input('num_ingresoinicial');
        $empresa->num_ingresoactual=$request->input('num_ingresoactual');
        $empresa->vigencia_cdp=$request->input('vigencia_cdp');
        $empresa->id_ciudad=$request->input('id_ciudad');
        $empresa->id_departamento=$request->input('id_departamento');

        $empresa->save();

        if ($empresa) {
            return redirect()->route('empresa.index');
        } else {
            return  redirect()->route('empresa.create');
        }
    }

    public function show($id)
    {
        $empresa=Empresa::find($id);
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        return view('empresa.show',compact('empresa',
            'departamentos','ciudades'));
    }



    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $departamentos=Departamento::all();
        $ciudades=Ciudades::all();
        if (Empresa::where('id', '=', $id)->count() > 0) {
            //dd($empresa);
            return view('empresa.edit', compact('empresa','departamentos','ciudades'));
        } else {
            return redirect()->route('empresa.index');
        }
    }

    public function update(Request $request, $id)
    {
        $empresa=Empresa::findOrFail($id);

        $empresa->nombre=$request->input('nombre');
        $empresa->nit=$request->input('nit');
        $empresa->dig_verificacion=$request->input('dig_verificacion');
        $empresa->codCgn=$request->input('codCgn');
        $empresa->marco_normativo=$request->input('marco_normativo');
        $empresa->direccion=$request->input('direccion');
        $empresa->telefono=$request->input('telefono');
        $empresa->correo=$request->input('correo');
        $empresa->url=$request->input('url');
        $empresa->nombreRepresentanteLegal=$request->input('nombreRepresentanteLegal');
        $empresa->cedulaRepresentanteLegal=$request->input('cedulaRepresentanteLegal');
        $empresa->no_tp_representante_legal=$request->input('no_tp_representante_legal');
        $empresa->lema=$request->input('lema');
        $empresa->marco_normativo=$request->input('marco_normativo');
        $empresa->num_ingresoinicial=$request->input('num_ingresoinicial');
        $empresa->num_ingresoactual=$request->input('num_ingresoactual');
        $empresa->vigencia_cdp=$request->input('vigencia_cdp');
        $empresa->id_ciudad=$request->input('id_ciudad');
        $empresa->id_departamento=$request->input('id_departamento');
        $empresa->nombreContador=$request->input('nombreContador');
        $empresa->cedulaContador=$request->input('cedulaContador');
        $empresa->noTpContador=$request->input('noTpContador');
        $empresa->nombreRevisorFiscal=$request->input('nombreRevisorFiscal');
        $empresa->cedulaRevisorFiscal=$request->input('cedulaRevisorFiscal');
        $empresa->noTPRevisorFiscal=$request->input('noTPRevisorFiscal');
        $empresa->nombreControlInterno=$request->input('nombreControlInterno');
        $empresa->cedulaControlInterno=$request->input('cedulaControlInterno');
        $empresa->noTPControlInterno=$request->input('noTPControlInterno');
        $empresa->jefePresupuesto=$request->input('jefePresupuesto');
        $empresa->cedulaJefePresupuesto=$request->input('cedulaJefePresupuesto');
        $empresa->noTPJefePresupuesto=$request->input('noTPJefePresupuesto');
        $empresa->otroResponsable=$request->input('otroResponsable');
        $empresa->nombreOtroResponsable=$request->input('nombreOtroResponsable');
        $empresa->cedulaJefePresupuesto=$request->input('cedulaJefePresupuesto');
        $empresa->noTPOtroResponsable=$request->input('noTPOtroResponsable');

        if ($request->hasFile('logo_republica'))
        {
            $file=$request->file('logo_republica');
            $name1=$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name1);
            $empresa->logo_republica=$name1;
        }
        if ($request->hasFile('logo_municipio'))
        {
            $file2=$request->file('logo_municipio');
            $name2=$file2->getClientOriginalName();
            $file2->move(public_path().'/images/',$name2);
            $empresa->logo_municipio=$name2;
        }

        if ($request->hasFile('logo_plandesarrollo'))
        {
            $file3=$request->file('logo_plandesarrollo');
            $name3=$file3->getClientOriginalName();
            $file3->move(public_path().'/images/',$name3);
            $empresa->logo_plandesarrollo=$name3;
        }

        $empresa->save();

        if ($empresa) {
            return redirect()->route('empresa.index');
        } else {
            return redirect()->route('empresa.edit');
        }

    }




}
