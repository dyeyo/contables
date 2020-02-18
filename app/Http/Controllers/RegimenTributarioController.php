<?php

namespace App\Http\Controllers;

use App\RegimenTributario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegimenTributarioController extends Controller
{
    
    public function index()
    {
        $regimenTrubutario=RegimenTributario::all();
        return view('extras.regimenTributario.index',compact('regimenTrubutario'));
    }
    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombre' => 'required'
        ]);
        if ($validations == true) {
            $regimenTrubutario = RegimenTributario::create($request->all());
            if ($regimenTrubutario) {
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
        if (RegimenTributario::where('id', '=', $id)->count() > 0) {
            $regimenTrubutario = RegimenTributario::find($id);
            return view('extras.regimenTributario.edit', compact('regimenTrubutario'));
        } else {
            return redirect()->route('regimenTributario.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombre' => 'required'

        ]);
        if ($validations == true) {
            $regimenTrubutario = RegimenTributario::find($id);
            $regimenTrubutario->update($request->all());
            if ($regimenTrubutario) {
                 Session::flash('message','EL registro se edito con Exito');
                return redirect()->route('regimenTributario.index',$id);
            } else {
                 Session::flash('message','Error al editar');
                return redirect()->route('regimenTributario.edit',$id);
            }
        } else {
             Session::flash('message','Error al editar');
                return redirect()->route('regimenTributario.edit',$id);
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            RegimenTributario::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('regimenTributario.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('regimenTributario.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}
