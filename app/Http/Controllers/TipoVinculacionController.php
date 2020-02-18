<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoVinculacion;
use Illuminate\Support\Facades\Session;

class TipoVinculacionController extends Controller
{
    public function index()
    {
        $tipoVinculacion=tipoVinculacion::all();
        return view('extras.tipoVinculacion.index',compact('tipoVinculacion'));
    }

    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombreVinculacion' => 'required'
        ]);
        if ($validations == true) {
            $tipoVinculacion = tipoVinculacion::create($request->all());
            if ($tipoVinculacion) {
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
        if (tipoVinculacion::where('id', '=', $id)->count() > 0) {
            $tipoVinculacion = tipoVinculacion::find($id);
            return view('extras.tipoVinculacion.edit', compact('tipoVinculacion'));
        } else {
            return redirect()->route('extras.tipoVinculacion.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombreVinculacion' => 'required'

        ]);
        if ($validations == true) {
            $tipoVinculacion = tipoVinculacion::find($id);
            $tipoVinculacion->update($request->all());
            if ($tipoVinculacion) {
                return redirect()->route('tipoVinculacion.index');
            } else {
                return redirect()->route('tipoVinculacion.edit',$id);
            }
        } else {
            return redirect()->route('tipoVinculacion.edit',$id);
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            TipoVinculacion::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('tipoVinculacion.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('tipoVinculacion.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}
