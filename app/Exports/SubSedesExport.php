<?php

namespace App\Exports;

use App\SubSede;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubSedesExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings(): array
    {
        return [
            'Código de Centro de Costo',
            'Nombre de Centro de Costo',
            'Nombre Corto de Centro de Costo',
            'Clase de Centro de Costo',
            'Prorrateo',
            'Nombre de Grupo de Centro de Costo',
            'Vigencia Inicio',
            'Vigencia Fin',
            'Sede',
            'Tercero Responsable',
            'Cuenta Aprobada'
        ];
    }

    public function collection()
    {
        return  DB::table('sub_sedes')
            ->join('sedes', 'sedes.id', '=', 'sub_sedes.sede_id')
            ->join('pucs', 'pucs.id', '=', 'sub_sedes.puc_id')
            ->join('personas', 'personas.id', '=', 'sub_sedes.tercero_id')

            ->select('sub_sedes.codigoCC', 'sub_sedes.NombreCC', 'sub_sedes.NombreCorto',
            'sub_sedes.tipoCC', 'sub_sedes.claseCC', 'sub_sedes.prorrateo', 'sub_sedes.nombreGrupoCC',
            'sub_sedes.vigenciaInicio', 'sub_sedes.vigenciaFin',

            'personas.nombre1','pucs.nombreCuenta'

            )
            ->get();
    }
}
