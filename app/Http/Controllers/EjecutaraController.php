<?php

namespace App\Http\Controllers;

use App\Terceros;
use Illuminate\Http\Request;
use App\UnidadEjecutara;
use Illuminate\Support\Facades\Session;

class EjecutaraController extends Controller
{

    public function index()
    {
        $ejecutara=UnidadEjecutara::all();
        //$terceros=Terceros::all();
        return view('extras.unidadEjecutara.index',compact('ejecutara'));
    }

    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombreUnidad' => 'required'
        ]);
        if ($validations == true) {
            $ejecutara = UnidadEjecutara::create($request->all());
            if ($ejecutara) {
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
        if (UnidadEjecutara::where('id', '=', $id)->count() > 0) {
            $ejecutara = UnidadEjecutara::find($id);
            return view('extras.unidadEjecutara.edit', compact('ejecutara'));
        } else {
            return redirect()->route('unidadEjecutar.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombreUnidad' => 'required'
        ]);
        if ($validations == true) {
            $ejecutara = UnidadEjecutara::find($id);
            $ejecutara->update($request->all());
            if ($ejecutara) {
                Session::flash('message','El registro se edito con exito');

                return redirect()->route('unidadEjecutar.index');
            } else {
                Session::flash('message','El registro no puede ser editado');

                return redirect()->route('unidadEjecutar.edit'.$id);
            }
        } else {
            Session::flash('message','El registro no puede ser editado');

            return redirect()->route('unidadEjecutar.edit'.$id);
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            UnidadEjecutara::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','El registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('unidadEjecutar.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','El registro se elimino con exito');
        return redirect()->route('unidadEjecutar.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}
