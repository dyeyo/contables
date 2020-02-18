<?php

namespace App\Http\Controllers;

use App\NivelEmpleo;
use Illuminate\Http\Request;
use App\CodigoEmpleo;
use Illuminate\Support\Facades\Session;

class CodigoEmpleoController extends Controller
{
    public function index()
    {
        $codEmpleo=CodigoEmpleo::all();
        $nivelEmpleo=NivelEmpleo::all();
        //dd($nivelEmpleo);
        return view('extras.codigoEmpleo.index',compact('codEmpleo','nivelEmpleo'));
    }

    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombreEmpleo' => 'required',
            'codigo' => 'required'
        ]);
        if ($validations)  {
            $codEmpleo = CodigoEmpleo::create($request->all());
                Session::flash('message','Registro editado con exito');
                return redirect()->route('codigoEmpleo.index');
            } else {
                Session::flash('message','Registro editado con exito');
                return redirect()->route('codigoEmpleo.index');

            }
    }

    public function edit($id)
    {
        if (CodigoEmpleo::where('id', '=', $id)->count() > 0) {
            $codEmpleo = CodigoEmpleo::find($id);
            $nivelEmpleo=NivelEmpleo::all();
            return view('extras.codigoEmpleo.edit', compact('codEmpleo','nivelEmpleo'));
        } else {
            return redirect()->route('extras.codigoEmpleo.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombreEmpleo' => 'required',
            'codigo' => 'required'

        ]);
        if ($validations == true) {
            $codEmpleo = codigoEmpleo::find($id);
            $codEmpleo->update($request->all());
            if ($codEmpleo) {
                Session::flash('message','Registro editado con exito');
                return redirect()->route('codigoEmpleo.index');
            } else {
                Session::flash('message','Error al editar');
                return redirect()->route('codigoEmpleo.index');
            }
        } else {
            Session::flash('message','Error al editar editado ');
            return redirect()->route('codigoEmpleo.index');
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            CodigoEmpleo::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('codigoEmpleo.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('codigoEmpleo.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}
