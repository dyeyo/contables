<?php

namespace App\Http\Controllers;

use App\AmbitosyBienes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BienesyServiciosController extends Controller
{
    public function index()
    {
        $bienes=AmbitosyBienes::all();
        return view('extras.bienesyservicios.index',compact('bienes'));
    }



    public function store(Request $request)
    {
        $validations = $this->validate($request, [
            'nombreBien' => 'required'
        ]);
        if ($validations == true) {
            $bienes = AmbitosyBienes::create($request->all());
            if ($bienes) {
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
        if (AmbitosyBienes::where('id', '=', $id)->count() > 0) {
            $bienes = AmbitosyBienes::find($id);
            return view('extras.bienesyservicios.edit', compact('bienes'));
        } else {
            return redirect()->route('bienes.index');
        }
    }

    public function update(Request $request, $id)
    {
        $validations = $this->validate($request, [
            'nombreBien' => 'required'

        ]);
        if ($validations == true) {
            $bienes = AmbitosyBienes::find($id);
            $bienes->update($request->all());
            if ($bienes) {
                return redirect()->route('bienes.index');
            } else {
                return view('extras.bienesyservicios.edit');
            }
        } else {
            return view('extras.bienesyservicios.edit');
        }
    }


    public function destroy($id)
    {
        try {
            //Eliminar registro
            AmbitosyBienes::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message','El registro no puede ser eliminado, comuniquese con el desarrollador');
            return redirect()->route('bienes.edit',$id);
            //return back()->with('message','EL registro no puede ser eliminado, comuniquese con el desarrollador');
        }
        //Retornar vista
        Session::flash('message','EL registro se elimino con exito');
        return redirect()->route('bienes.index');
        /*ClasePersona::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');*/
    }
}