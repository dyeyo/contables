<?php

namespace App\Http\Controllers;

use App\Persona;
use App\PlantillaContable;
use App\Puc;
use App\Transacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Object_;
use Illuminate\Support\Collection;
use App\Models\Settings\MesesContables;
use App\Models\Settings\PeriodoContables;
use App\Models\Settings\NivelesPuc;

use App\Models\clsBd;
use App\Models\clsUtil;
use Yajra\Datatables\Datatables;

class LibrosContablesController extends Controller
{

    protected $bd;

    protected $util;

    private $pucs_utilizados = [];
    

    public function __construct(clsBd $bd, clsUtil $obj_util) {
       
        $this->bd = $bd;
        $this->util = $obj_util;
    }


    public function getLibrosAuxiliar()
    {
        $puc=Puc::select('id','codigo_cuenta','nombre_cuenta', 'tipoCuenta_id')->get();
        $personas = DB::table('personas')
            ->leftJoin('personas_naturales', 'personas.natural_id', '=', 'personas_naturales.id')
            ->leftJoin('personas_juridicas', 'personas.juridica_id', '=', 'personas_juridicas.id')
            ->leftJoin('personas_empleados', 'personas.empleado_id', '=', 'personas_empleados.id')
            ->select('personas.id','personas.nombre1', 'personas.nombre2', 'personas.apellido', 'personas.apellido2','personas.raz_social',
                'personas_naturales.numeroDocumento','personas_juridicas.nit','personas_empleados.numeroDocumento')
            ->get();
        //Persona::with('natural', 'juridica', 'empleado')->get();
        //dd($puc,$personas);
        return view('librosContables.libroAxuliar.libroAuxiliar',compact('puc','personas'));
    }

    public function filterLibrosAuxiliar(Request $request)
    {
        $fechaInicial=$request->fechaInicial;
        $fechaFinal=$request->fechaCorte;
        $this->pucInicial=$request->pucInicial;
        $this->pucFinal=$request->pucFinal;
        $tercero=$request->tercero;

        $reporte = transacciones::with(['plantilaContable' => function($query) {
            $query->whereBetween('puc_id', array($this->pucInicial, $this->pucFinal));
        }])
            ->where('tercero_id',$tercero)
            ->where('fecha_movimiento','>=', $fechaInicial)
            ->where('fecha_movimiento','<=', $fechaFinal)
            ->get();

        foreach ($reporte as $key => $value) {
            foreach ($value->plantilaContable as $key => $value2) {
                $puc = Puc::find($value2->puc_id);
                array_push($this->pucs_utilizados, $puc);
            }
        }

        $r = array_unique($this->pucs_utilizados);
        $puc_list = $r;



        return view('librosContables.libroAxuliar.libroAuxiliarReporte', compact('reporte', 'fechaInicial', 'fechaFinal', 'puc_list'));
    }

    public function getBalancePrueba()
    {
       
        $arr_accounting_month =MesesContables::orderBy('id')->pluck('nom_mes', 'id')->all(); 
        $arr_years =PeriodoContables::groupBy('year_periodo')->pluck('year_periodo', 'year_periodo')->all(); 
        $arr_nivel_puc =NivelesPuc::orderBy('id')->pluck('nom_nivel', 'id')->all(); 
        $arr_nivel_puc[0]='..Seleccione uno..';
        $month = date('m');
        $year = date('Y');
        
        return view('librosContables.libroAxuliar.libroAuxiliarReporte',compact('arr_accounting_month','arr_years','month','year','arr_nivel_puc'));
    }

    public function filterBalancePrueba(Request $request)
    {
        
        $month_from=$request->get('optBusqMonthFrom');
        $month_until=$request->get('optBusqMonthUntil');
        
         $filter = " substr(AA.codigo_cuenta::text, 0, 2)::integer IN(1,2,3) ";
        
         $arr_filter['date_from'] = $request->get('optBusqYearFrom').'-'.$month_from.'-01';
         $arr_filter['date_until'] = $request->get('optBusqYearFrom').'-'.$month_until.'-'.($this->util->ultimo_dia_mes($request->get('optBusqYearFrom'), $month_until));
     
         if ($request->get('optBusqNivelPucDesde')&&!empty($request->get('optBusqNivelPucDesde'))) {
            $filter.= ($filter ? ' AND ' : ' ') . ' AA.nivel_puc_id >= ' . $request->get('optBusqNivelPucDesde');
        }
        
        if($request->get('optBusqAccountingAccountLevelsH')&&!empty($request->get('optBusqAccountingAccountLevelsH'))){
           $filter.= ($filter ? ' AND ' : ' ') . ' AA.nivel_puc_id <= ' . $request->get('optBusqNivelPucH');
        }
        if($request->get('optSaldo')==2)
        {
          $arr_filter['report_type'] =1;
        }
   
       
        $arr_filter['filter'] = $filter;
        $arrData = [
            //LLAMADA DE FUNCION ALMACENADA
            'name' => 'public.pl_query_movimiento_contable',
            'param' => [json_encode($arr_filter)],
            'return' => ['id_account TEXT', 'number_account TEXT', 'name_account TEXT', 'previous_balance TEXT', 'debit_total TEXT', 'credit_total TEXT', 'current_balance TEXT', 'code_color TEXT']
        ];

       /* $arrData = [
            //LLAMADA DE FUNCION ALMACENADA sin parametros
            'name' => 'public.pl_sumar',

        ];*/
        /*$arrData = [
            //LLAMADA DE FUNCION ALMACENADA con parametros
            'name' => 'public.pl_sumar_2',
            'param' => [45,5],
        ];*/
        //$arrData['toSql'] = true;
        $arr_data = $this->bd->ejecuta_procedimiento($arrData);



        //print_r($arr_data[0]->pl_sumar_2);exit();
        
         $n = count($arr_data);
        $movements = new Collection;
        if ($n > 0) {
            foreach ($arr_data as $data) {
                $movements->push($data);
            }
        }
        
        return Datatables::of($movements)
        ->addColumn('previous_balance', function ($movements) {
            return number_format($movements->previous_balance, 2);            
        })
        ->addColumn('debit_total', function ($movements) {
            return number_format($movements->debit_total, 2);            
        })
        ->addColumn('credit_total', function ($movements) {
            return number_format($movements->credit_total, 2);            
        })
        ->make(true);
        
    }



    public function getLibroMayor()
    {
        return view('librosContables.libroMayor.libroMayor');
    }




}
