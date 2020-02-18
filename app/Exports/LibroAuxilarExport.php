<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class LibroAuxilarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $reporte = DB::table('transacciones')
            ->join('personas', 'transacciones.tercero_id', '=', 'personas.id')
            ->join('plantilla_contables', 'transacciones.id', '=', 'plantilla_contables.transacciones_id')
            ->join('pucs', 'plantilla_contables.puc_id', '=', 'pucs.id')
            ->select('transacciones.id', 'transacciones.fecha_movimiento',
                'transacciones.numero_doc', 'transacciones.detalle','personas.nombre1', 'personas.nombre2', 'personas.apellido',
                'personas.apellido2', 'plantilla_contables.debito', 'plantilla_contables.credito','plantilla_contables.docReferencia',
                'transacciones.created_at','pucs.codigo_cuenta','pucs.nombre_cuenta','plantilla_contables.puc_id')
            ->get();
        //dd($fechaInical. 'y ' .$fechaAnterior);
        $saldoInical= DB::table('plantilla_contables')
            ->select(DB::raw("SUM(debito) as total" ))
            ->join('transacciones', 'plantilla_contables.transacciones_id', '=', 'transacciones.id')
            ->get();

        return $reporte;
    }
}
