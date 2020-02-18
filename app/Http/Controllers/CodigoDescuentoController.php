<?php

namespace App\Http\Controllers;

use App\CodigoConcepto;
use App\RetencionesDescuentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CodigoDescuentoController extends Controller
{

    public function index()
    {
        $codigo=CodigoConcepto::all();
        return view('extras.codigoDescuento.index',compact('codigo'));
    }


    public function store(Request $request)
    {
        $codigo=new CodigoConcepto();
        $codigo->create($request->all());
        Session::flash('message','Codigo registrado con exito');
        return redirect()->route('codigo.index');
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
