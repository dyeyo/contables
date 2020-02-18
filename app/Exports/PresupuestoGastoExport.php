<?php

namespace App\Exports;

use App\CentroGasto;
use App\Puc;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresupuestoGastoExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'ID',
            'Codigo de Cuenta',
            'Codigo Superior',
            'Nombre de Rubro',
            'Tipo de Cuenta **1=SUPERIOR 2=DETALLE***',
            'Nivel',
            'Fuente Recurso',
            'Situación',
            'Autorización',
            'Clase Presupuesto',
            'Tipo Vigencia',
            'Apropiacion Inical',
            '¿Es Vigencia? **1=SI 2=NO***',
            '¿Es Reserva? **1=SI 2=NO***',
            'Presupuesto Superior (RELACION)',
        ];
    }

    public function collection()
    {
        return CentroGasto::select('id','codigo_presupuestal','codigo_superior','nombre_rubro','tipo_cuenta_id',
            'nivel_id','fuente_recurso','situacion','autorizacion','clase_presupuesto','tipo_vigencia','apropiacion_inical',
            'esVigencia','esReserva','id_presupuesto_superior')->orderBy('id','ASC')->get();

        //dd($d->toArray());
    }
}
