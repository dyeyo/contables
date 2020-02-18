<?php

namespace App\Http\Controllers;

use App\NivelPresupuestal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NivelPresupuestalController extends Controller
{
    public function index()
    {
        //$anio = session('year');
        $nivel=NivelPresupuestal::all();
        return view('nivelPresupuesto.index',compact('nivel'));
    }

    public function edit($id)
    {
        $nivel=NivelPresupuestal::find($id);
        return view('nivelPresupuesto.edit',compact('nivel'));
    }

    public function update(Request $request, $id)
    {
        $nivel=NivelPresupuestal::find($id);
        $nivel->update($request->all());
        Session::flash('message','Nivel Editado con exito');
        return redirect()->route('nivelPresupuesto.index');
    }

}
