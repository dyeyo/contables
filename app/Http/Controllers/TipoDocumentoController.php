<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDocumento;
use Illuminate\Support\Facades\Session;

class TipoDocumentoController extends Controller
{

    public function index(Request $request)
    {
       /* if ($request->ajax()) {
            $tipoDoc = TipoDocumento::all();
            return response()->json($tipoDoc);
        }
        return view('extras.tipoDocumento.index');*/
        $tipoDoc=TipoDocumento::all();
        return view('extras.tipoDocumento.index',compact('tipoDoc'));
    }

    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'codigo' => 'required',
            'nombreDocumento' => 'required'
        ]);
        if ($validations == true) {
            $tipoDoc = TipoDocumento::create($request->all());
            if ($tipoDoc) {
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
        if (TipoDocumento::where('id', '=', $id)->count() > 0) {
            $tipoDoc = TipoDocumento::find($id);
            //dd($tipoDoc);
            return view('extras.tipoDocumento.edit', compact('tipoDoc'));
        } else {
            return redirect()->route('tipoDocumento.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'codigo' => 'required',
            'nombreDocumento' => 'required'
        ]);
        if ($validations == true) {
            $tipoDoc = TipoDocumento::find($id);
            $tipoDoc->update($request->all());
            if ($tipoDoc) {
                Session::flash('message','EL registro se edito con Exito');
                return redirect()->route('tipoDocumento.index',$id);
            } else {
                Session::flash('message','Error al editar');
                return redirect()->route('tipoDocumento.edit',$id);
            }
        } else {
            Session::flash('message','Error al editar');
            return redirect()->route('tipoDocumento.edit',$id);
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            TipoDocumento::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('tipoDocumento.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('tipoDocumento.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/

    }
}
