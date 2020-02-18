<?php

namespace App\Imports;

use App\Persona;
use App\PersonasNaturales;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonasImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        //dd($natural);
        foreach ($rows as $row) {
            $natural = PersonasNaturales::create([
                'numeroDocumento' => $row[0],
                'id_tipoDocumento' => $row[1],
                'responsableIVA' => $row[10],
                'id_clase' => 5,
                'id_actividadesCiiu' => 481,
                'descritores_id' => 5,
                'ciudad_id' =>2,
                'idDepartamento' =>34,
                'entidadBancaria_id' => 1,
                //'dependencia_id' => 1,
            ]);
            //dd($row);
            $natural->persona()->create([
                'nombre1' => $row[2],
                'nombre2' => $row[3],
                'apellido' => $row[4],
                'apellido2' => $row[5],
                'direccion' => $row[6],
                'telefono' => $row[7],
                'celular' => $row[8],
                'correo' => $row[9],
                'regimenSimple' => $row[11],
            ]);
        }

    }
}
