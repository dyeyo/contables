<?php

namespace App\Imports;
use App\CentroGasto;
use Maatwebsite\Excel\Concerns\ToModel;

class CentroGastoImport implements ToModel
{
    public $repetidos = [];
    public function model(array $row)
    {
        $variable = CentroGasto::where('codigo_presupuestal', $row[0])->get();
        if(count($variable) > 0){
            $this->repetidos[] = $row;
        }
        if (CentroGasto::where('codigo_presupuestal', $row[0])->count() > 0) {
            // si se repite lo guardamos en un arreglo
            $this->repetidos[] = $row;
        } else {
            //si no se repite lo guardamos en la base
            return new CentroGasto([
                'codigo_presupuestal' => $row[0],
                'id_presupuesto_superior' => $row[1],
                'codigo_superior' => $row[2],
                'nombre_rubro' => $row[3],
                'tipo_cuenta_id' => $row[4],
                'fuente_recurso' => $row[5],
            ]);
        }
    }
}