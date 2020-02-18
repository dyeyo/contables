<?php

namespace App\Http\Controllers;

use App\CiiuDescriptores;
use App\ClasePersona;
use App\CodigoEmpleo;
use App\RegimenTributario;
use App\Terceros;
use App\TipoDocumento;
use App\TipoVinculacion;
use App\UnidadEjecutara;
use Illuminate\Http\Request;
use App\Departamento;
use App\Http\Requests\TercerosRequest;

class TercerosController extends Controller
{
    
    public function index()
    {
       return view('terceros.index');
    }

    public function create()
    {
        $departamentos=Departamento::all();
        $tipoDoc=TipoDocumento::all();
        $regimenContri=RegimenTributario::all();
        $descriptoresnCiiu=CiiuDescriptores::all();
        $claseP=ClasePersona::all();
        $tipoVinculacion=TipoVinculacion::all();
        $nivelEmpleo=TipoVinculacion::all();
        $codEmpleo=CodigoEmpleo::all();
        $unidadEje=UnidadEjecutara::all();
        $dependencia=UnidadEjecutara::all();
        return view('terceros.create', compact('departamentos','tipoDoc',
            'claseP','regimenContri','descriptoresnCiiu','tipoVinculacion','nivelEmpleo','codEmpleo',
            'unidadEje','dependencia'));
    }

    public function store(TercerosRequest $request)
    {

        $terceros = Terceros::create($request->all());
        if ($terceros) {
            return view('terceros.index');
        } else {
            return view('terceros.create');
        }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
