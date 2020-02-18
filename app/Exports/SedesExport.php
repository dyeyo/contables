<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SedesExport implements FromCollection,WithHeadings
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
            'Tercero Responsable',
            'Cuenta Aprobada'
        ];
    }

    public function collection()
    {
        return DB::table('sedes')
            ->join('personas', 'personas.id', '=', 'sedes.tercero_id')
            ->join('pucs', 'pucs.id', '=', 'sedes.puc_id')
            ->select(
            'sedes.codigoCC', 'sedes.NombreCC', 'sedes.NombreCorto', 'sedes.tipoCC',
            'sedes.claseCC', 'sedes.prorrateo', 'sedes.nombreGrupoCC', 'sedes.vigenciaInicio',
            'sedes.vigenciaFin',

            'personas.nombre1','pucs.nombreCuenta'
        )->get();
    }
}
