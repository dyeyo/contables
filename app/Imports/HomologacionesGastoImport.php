<?php

namespace App\Imports;

use App\HomologacionGasto;
use Maatwebsite\Excel\Concerns\ToModel;

class HomologacionesGastoImport implements ToModel
{
    public function model(array $row)
    {
        return new HomologacionGasto([
            'presupuesto_gasto_id' => $row[0],
            'anio' => $row[4],
            'codigo_presupuestal_hom' => $row[5],
            'codigo_superior_hom' => $row[6],
            'nombre_rubro_hom' => $row[7],
            'tipo_cuenta_hom_id' => $row[8],
            'nivel_hom_id' => $row[9],
            'fuente_recurso_hom' => $row[10],
            'situacion_hom' => $row[11],
            'autorizacion_hom' => $row[12],
            'clase_presupuesto_hom' => $row[13],
            'tipo_vigencia_hom' => $row[14],
            'apropiacion_inical_hom' => $row[15],
            'esVigencia_hom' => $row[16],
            'esReserva_hom' => $row[17],
        ]);
    }
}
