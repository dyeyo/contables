<?php

namespace App\Exports;

use App\Puc;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PucExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'ID',
            'Codigo de Cuenta',
            'Nombre de Cueta',
            'Tipo **1=SUPERIOR 2=DETALLE***',
            'Nivel'
        ];
    }

    public function collection()
    {
        return Puc::select('id','codigo_cuenta','nombre_cuenta','tipoCuenta_id','nivel')->where('id','!=',1)->orderBy('id','ASC')->get();

        //dd($d->toArray());
    }
}

