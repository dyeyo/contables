<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;


class RetencionesExport implements FromView{

     public function view(): View{
         return view('retenciones.export', [
             $r='retenciones' => DB::table('retencion_descuentos')
                 ->leftJoin('personas', 'personas.id', '=', 'retencion_descuentos.tercero_id')
                 ->leftJoin('personas_empleados', 'personas_empleados.id', '=', 'personas.empleado_id')
                 ->leftJoin('personas_juridicas', 'personas_juridicas.id', '=', 'personas.juridica_id')
                 ->leftJoin('personas_naturales', 'personas_naturales.id', '=', 'personas.natural_id')
                 ->select(
                     'retencion_descuentos.tipoRetencion', 'retencion_descuentos.id', 'retencion_descuentos.concepto',
                     'retencion_descuentos.tercero_id', 'retencion_descuentos.territorialidad', 'retencion_descuentos.mecanismo',
                     'retencion_descuentos.monto_minimo', 'retencion_descuentos.valor_fijo',
                     'personas.nombre1','personas.nombre2','personas.apellido','personas.apellido2','personas.raz_social',
                     'personas_empleados.numeroDocumento','personas_juridicas.nit','personas_naturales.numeroDocumento'
                 )->get()
         ]);

     }
}
