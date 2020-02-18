<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClasePersona;
use Illuminate\Support\Facades\Session;

class ClasePersonaController extends Controller
{

    public function index(Request $request)
    {
        /* if ($request->ajax()) {
             $tipoDoc = TipoDocumento::all();
             return response()->json($tipoDoc);
         }
         return view('extras.tipoDocumento.index');*/
        $clasePersona=ClasePersona::all();
        return view('extras.clasePersona.index',compact('clasePersona'));
    }

    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombre' => 'required'
        ]);
        if ($validations == true) {
            $clasePersona = ClasePersona::create($request->all());
            if ($clasePersona) {
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
        if (ClasePersona::where('id', '=', $id)->count() > 0) {
            $clasePersona = ClasePersona::find($id);
            return view('extras.clasePersona.edit', compact('clasePersona'));
        } else {
            return redirect()->route('clasePersona.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombre' => 'required'
        ]);
        if ($validations == true) {
            $clasePersona = ClasePersona::find($id);
            $clasePersona->update($request->all());
            if ($clasePersona) {
                Session::flash('message','EL registro se edito con Exito');
                return redirect()->route('clasePersona.index',$id);
            } else {
                Session::flash('message','Error al editar');
                return redirect()->route('clasePersona.edit',$id);
            }
        } else {
            Session::flash('message','Error al editar');
            return redirect()->route('clasePersona.edit',$id);
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            ClasePersona::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('clasePersona.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('clasePersona.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}
