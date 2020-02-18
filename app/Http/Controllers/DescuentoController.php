<?php

namespace App\Http\Controllers;

use App\CodigoConcepto;
use App\RetencionDescuentos;
use App\Puc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DescuentoController extends Controller
{

    public function index()
    {
        $anio = session('year');
        $descuento =DB::table('retencion_descuentos')
            ->join('pucs', 'retencion_descuentos.puc_id', '=', 'pucs.id')
            ->join('codigo_conceptos', 'retencion_descuentos.codigo_id', '=', 'codigo_conceptos.id')
            ->select('retencion_descuentos.id','retencion_descuentos.anio','retencion_descuentos.concepto',
                'retencion_descuentos.porcentaje','retencion_descuentos.base','retencion_descuentos.automatico',
                'retencion_descuentos.activo','codigo_conceptos.codigo','pucs.codigoCuenta')
           ->where('retencion_descuentos.RetoDes','!=',null)
           ->where('retencion_descuentos.anio',$anio)
           ->get();
        //dd($descuento);
        return view('descuentos.index',compact('descuento'));
    }

    public function create()
    {
        $puc=Puc::all();
        $anio = session('year');
        $codigo=CodigoConcepto::all();
        return view('descuentos.create',compact('puc','codigo','anio'));
    }

    public function store(Request $request)
    {
        $descuento=new RetencionDescuentos();
        $descuento->create($request->all());
        Session::flash('message','Descuento registrado con exito');
        return redirect()->route('descuentos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $descuento=RetencionDescuentos::findOrFail($id);
        $puc=Puc::all();
        $codigo=CodigoConcepto::all();
        return view('descuentos.edit',compact('puc','codigo','descuento'));
    }

    public function update(Request $request, $id)
    {
        $descuento=RetencionDescuentos::findOrFail($id);
        $descuento->update($request->all());
        Session::flash('message','Descuento Editado con exito');
        return redirect()->route('descuentos.index');
    }

    public function destroy($id)
    {
        $descuento=RetencionDescuentos::findOrFail($id)->delete();
        Session::flash('message','El registro se elimino con exito');
        return redirect()->route('descuentos.index');
    }
}
