<?php

namespace App\Exports;

use App\Puc;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;


class NiffExport implements FromView{
    public function view(): View{
        return view('niffs.export', [
            'niffs' => DB::table('pucs')
                ->distinct()
                ->leftJoin('niffs', function($join)
                {
                    $join->on('pucs.id', '=', 'niffs.puc_id');
                })->select('pucs.id','pucs.codigo_cuenta','pucs.nombre_cuenta','pucs.anio',
                    'niffs.codigoNiff','niffs.nombreNiff','niffs.tipoCuenta_id','niffs.naturalezaCuenta','niffs.nivel')
                ->get()
        ]);
    }
}

