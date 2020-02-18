<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class HomologacionesGastoExport implements FromView
{
    public function view(): View{
       return view('presupuestoGasto.homologaciones.export', [
            'homologacion_gasto' => DB::table('presupuesto_gasto')
                ->distinct()
                ->leftJoin('homologacion_gasto', function($join)
                {
                    $join->on('presupuesto_gasto.id', '=', 'homologacion_gasto.presupuesto_gasto_id');
                  })->select(
                    'presupuesto_gasto.id',
                   'presupuesto_gasto.codigo_presupuestal',
                   'presupuesto_gasto.codigo_superior',
                   'presupuesto_gasto.nombre_rubro',
                   'presupuesto_gasto.anio',
                   'presupuesto_gasto.tipo_cuenta_id',
                   'presupuesto_gasto.nivel_id',
                   'presupuesto_gasto.fuente_recurso',
                   'presupuesto_gasto.situacion',
                   'presupuesto_gasto.autorizacion',
                   'presupuesto_gasto.clase_presupuesto',
                   'presupuesto_gasto.tipo_vigencia',
                   'presupuesto_gasto.apropiacion_inical',
                   'presupuesto_gasto.esVigencia',
                   'presupuesto_gasto.esReserva',
                   'presupuesto_gasto.id_presupuesto_superior',


                    'homologacion_gasto.presupuesto_gasto_id',
                    'homologacion_gasto.anio',
                    'homologacion_gasto.codigo_presupuestal_hom',
                    'homologacion_gasto.codigo_superior_hom',
                    'homologacion_gasto.nombre_rubro_hom',
                    'homologacion_gasto.tipo_cuenta_hom_id',
                    'homologacion_gasto.nivel_hom_id',
                    'homologacion_gasto.fuente_recurso_hom',
                    'homologacion_gasto.situacion_hom',
                    'homologacion_gasto.autorizacion_hom',
                    'homologacion_gasto.clase_presupuesto_hom',
                    'homologacion_gasto.tipo_vigencia_hom',
                    'homologacion_gasto.apropiacion_inical_hom',
                    'homologacion_gasto.esVigencia_hom',
                    'homologacion_gasto.esReserva_hom'
                )
                ->orderBy('id','ASC')
                ->get()
        ]);
    }
}
