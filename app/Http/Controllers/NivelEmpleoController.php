<?php

namespace App\Http\Controllers;

use App\CodigoEmpleo;
use Illuminate\Http\Request;
use App\NivelEmpleo;
use Illuminate\Support\Facades\Session;

class NivelEmpleoController extends Controller
{
    public function index()
    {
        $nivelEmpleo=NivelEmpleo::all();
        return view('extras.nivelEmpleo.index',compact('nivelEmpleo'));
    }



    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombre' => 'required',
            //'codigo' => 'required',
        ]);
        if ($validations == true) {
            $nivelEmpleo = NivelEmpleo::create($request->all());
            if ($nivelEmpleo) {
                return response()->json(['success' => trans('translate.ok')]);
            } else {
                return response()->json(['error' => trans('translate.failed')]);
            }
        } else {
            return response()->json(['error' => trans('translate.required')]);
        }
    }

    public function edit($id)
    {

        if (NivelEmpleo::where('id', '=', $id)->count() > 0) {
            $nivelEmpleo = NivelEmpleo::find($id);
            return view('extras.nivelEmpleo.edit', compact('nivelEmpleo'));
        } else {
            return redirect()->route('extras.nivelEmpleo.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombre' => 'required',
            //'codigo' => 'required'

        ]);
        if ($validations == true) {
            $nivelEmpleo = NivelEmpleo::find($id);
            $nivelEmpleo->update($request->all());
            if ($nivelEmpleo) {
                Session::flash('message','EL registro se elimino con exito ');
                return redirect()->route('nivelEmpleo.index');
            } else {
                Session::flash('message','Error al editar ');
                return redirect()->route('nivelEmpleo.edit',$id);
            }
        } else {
            Session::flash('message','Error al editar ');
                return redirect()->route('nivelEmpleo.edit',$id);
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            NivelEmpleo::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('nivelEmpleo.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('nivelEmpleo.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}