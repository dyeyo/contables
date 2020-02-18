<?php

namespace App\Imports;

use App\Niff;
use Maatwebsite\Excel\Concerns\ToModel;

class NiffImport implements ToModel
{

    public function model(array $row)
    {
        return new Niff([
            'puc_id'=> $row[0],
            'anio'=> $row[3],
            'codigoNiff'=> $row[4],
            'nombreNiff'=> $row[5],
            'tipoCuenta_id'=> $row[6],
            'naturalezaCuenta'=> $row[7],
            'nivel'=> $row[8],
        ]);
    }
}
