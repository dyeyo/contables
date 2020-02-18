<?php

namespace App\Http\Controllers;

use App\TipoPresupuestoComprobante;
use Illuminate\Http\Request;

class TipoPresupuestoController extends Controller
{
    public function loadTipoPresupuesto($id)
    {
        return response()->json(TipoPresupuestoComprobante::where('comprobante_id', $id)
            ->join('tipo_presupuestos', 'tipo_presupuesto_comprobantes.tipoPresupuesto_id',
                '=', 'tipo_presupuestos.id')
            ->join('comprobantes', 'tipo_presupuesto_comprobantes.comprobante_id',
                '=', 'comprobantes.id')
            ->select('tipo_presupuestos.id','tipo_presupuestos.nombrePresupuesto',
                'tipo_presupuesto_comprobantes.comprobante_id')
            //->where('tipo_presupuesto_comprobantes.comprobante_id',$id)
            ->get());
    }
}
