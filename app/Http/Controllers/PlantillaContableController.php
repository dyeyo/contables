<?php

namespace App\Http\Controllers;

use App\PlantillaContable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlantillaContableController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function plantillaRetencionStore(Request $request)
    {
        /*$validations = $this->validate($request, [
            'nombreEmpleo' => 'required',
            'codigo' => 'required'
        ]);*/
        //f ($validations)  {
            $plantilla = PlantillaContable::create($request->all());
            Session::flash('message','Registro editado con exito');
            return redirect()->route('codigoEmpleo.index');
        /*} else {
            Session::flash('message','Registro editado con exito');
            return redirect()->route('codigoEmpleo.index');

        }*/
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
