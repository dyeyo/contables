<?php

namespace App\Http\Controllers;

use App\CodigoEntidadFinancierasSIA;
use App\conceptoDianExogeno;
use App\CuentaMaesta;
use App\Empresa;
use App\Exports\CuentaInstitucionalExport;
use App\Exports\PucExport;
use App\formatoDianExogeno;
use App\FuentesFinancierasSIA;
use App\FUTExcedentesLiquidez;
use App\Http\Requests\CuentasInstitucionaleseRequest;
use App\Persona;
use App\PersonasJuridicas;
use App\PrivilegiosPUC;
use App\Puc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Excel;

class CuentaInstitucionalController extends Controller
{

    public function index()
    {
        $cuenta=Puc::where('opciones_privilegios_id','=',7)
                    ->whereNotNull('codigo_cuenta')
                    ->whereNotNull('codigo_superior')
                    ->whereNotNull('nombre_cuenta')
                    ->whereNotNull('tipoCuenta_id')
                    //->whereNotNull('naturalezaCuenta')
                    //->whereNotNull('CuentaCoNC')
                    ->whereNotNull('numeroCuenta')
                    ->get();
        //dd($cuenta);
      /*  $digitosCuenta=Puc::select('codigo_cuenta')->get();
        $primerosCuatros=($digitosCuenta,0,-3);
        if ($primerosCuatros=1110){
            dd($primerosCuatros);
        }
        else{
            echo "no";
        }*/
        $cuentaPendientes=Puc::Where('opciones_privilegios_id','=',7)
                            // ESTE ES PARA QUE COMIENZE EN 1110 ->orWhere('codigo_cuenta')
                            ->whereNull('numeroCuenta')
                            ->get();
        $conteo=count($cuentaPendientes);
        //dd($cuentaPendientes);
        return view('cuentasInstitucioales.index',compact('cuenta','cuentaPendientes','conteo'));
    }


    public function edit($id)
    {
        $puc=Puc::find($id);
        $concepto=conceptoDianExogeno::all();
        $formato=formatoDianExogeno::all();
        $privilegios=PrivilegiosPUC::all();
        $fuentes=FuentesFinancierasSIA::all();
        $codigoEntidad=CodigoEntidadFinancierasSIA::all();
        $pucMaestra =CuentaMaesta::all();
        $fut=FUTExcedentesLiquidez::all();
        $personaJuridica=PersonasJuridicas::select('id','nomComercial','nit')->where('banco','=','SI')->get();
        $empresa=Empresa::with('Puc')->get();
        return view('cuentasInstitucioales.edit',compact('puc','personaJuridica','empresa',
            'codigoEntidad','pucMaestra','fut','fuentes','concepto','formato','privilegios'));


    }

    public function update(CuentasInstitucionaleseRequest $request, $id)
    {
        $puc=Puc::find($id);
        $puc->update($request->all());
        //dd($puc);
        $puc->save();
        Session::flash('message','Cuenta editada con exito');
        return redirect()->route('cuentasInstitucionales.index');

    }

    public function destroy($id)
    {
        //
    }

    public function exportPuc()
    {
        return (new  PucExport)->download('Puc.xlsx');
    }

    public function pdf($id){

        $puc=Puc::find($id);
        /*$pucs= DB::table('pucs')
            //->find($id)
                ->where('pucs.id','=',$id)
            ->join('fuentes_financieras_s_i_as', 'fuentes_financieras_s_i_as.id', '=', 'pucs.fuentefinanciacionSIA_id')
            ->join('codigo_entidad_financieras_s_i_as', 'codigo_entidad_financieras_s_i_as.id', '=', 'pucs.codigoEntidadFinancieraSIA_id')
            ->join('cuenta_maestas', 'cuenta_maestas.id', '=', 'pucs.cuentaMaestra_id')
            ->join('f_u_t_excedentes_liquidezs', 'f_u_t_excedentes_liquidezs.id', '=', 'pucs.futExcedentesLiquidez_id')
            ->join('concepto_dian_exogenos', 'concepto_dian_exogenos.id', '=', 'pucs.conceptoDian_id')
            ->join('formato_dian_exogenos', 'formato_dian_exogenos.id', '=', 'pucs.formatoDian_id')
            ->join('entidad_bancarias', 'entidad_bancarias.id', '=', 'pucs.opciones_privilegios_id')

            ->select('pucs.codigo_cuenta', 'pucs.codigo_superior', 'pucs.nombre_cuenta', 'pucs.tipoCuenta',
                'pucs.naturalezaCuenta', 'pucs.CuentaCoNC', 'pucs.cuentaCobrar', 'pucs.cuentaPagar',
                'pucs.refiereFlujo', 'pucs.exigeTerceros', 'pucs.exigeCentroCostos', 'pucs.exigeBase', 'pucs.activa',
                'pucs.numeroCuenta', 'pucs.descripcion',
                'pucs.tipoCuentaBancaria', 'pucs.situacionFondos', 'pucs.usocuentaBancaria', 'pucs.posicionClasificadorPresupuestalGastos',
                'pucs.posicionClasificadorPresupuestalIngresos', 'pucs.codigoInterno', 'pucs.codigoSucursal',
                'pucs.porcentaje',

                'fuentes_financieras_s_i_as.concepto','codigo_entidad_financieras_s_i_as.abreviatura',
                'cuenta_maestas.concepto','f_u_t_excedentes_liquidezs.concepto',
                'concepto_dian_exogenos.codigo', 'formato_dian_exogenos.nombre',
                'entidad_bancarias.DenominacionSocialEntidad'
            )->get();*/
        //dd($puc);
        $concepto=conceptoDianExogeno::all();
        $formato=formatoDianExogeno::all();
        $privilegios=PrivilegiosPUC::all();
        $fuentes=FuentesFinancierasSIA::all();
        $codigoEntidad=CodigoEntidadFinancierasSIA::all();
        $pucMaestra =CuentaMaesta::all();
        $fut=FUTExcedentesLiquidez::all();
        $personaJuridica=PersonasJuridicas::select('id','nit','raz_social')->where('banco','=','SI')->get();
        $empresa=Empresa::with('Puc')->get();
        //dd($puc);
        /*$cuenta= Puc::select('numeroCuenta', 'descripcion', 'tipoCuentaBancaria', 'situacionFondos', 'usocuentaBancaria',
            'posicionClasificadorPresupuestalGastos', 'posicionClasificadorPresupuestalIngresos', 'fuentefinanciacionSIA_id',
            'codigoEntidadFinancieraSIA_id', 'cuentaMaestra_id', 'futExcedentesLiquidez_id','codigoInterno',
            'codigoSucursal', 'empresa_id')
            ->where('id','=',$id)
            ->take(1)
            ->get();*/

        $pdf= \PDF::loadView('cuentasInstitucioales.cuentaPdf',compact('puc',
            'concepto', 'formato', 'privilegios', 'fuentes', 'codigoEntidad', 'pucMaestra',
            'fut', 'personaJuridica', 'empresa'));
        return $pdf->download('CuentaInstitucional'.'.pdf');
    }

}
