<?php

namespace App\Imports;

use App\PlantillaContable;
use App\Transacciones;
use Maatwebsite\Excel\Concerns\ToModel;
class TrasnsacciomImport implements ToModel
{

    public function model(array $row)
    {
        $transaccion_para_actualizar = Transacciones::find($row[0]);

        $transaccion_para_actualizada = Transacciones::find($transaccion_para_actualizar->id)
                                                    ->update([
                                                        'total_debito' => $transaccion_para_actualizar->total_debito + $row[6],
                                                        'total_credito' => $transaccion_para_actualizar->total_credito + $row[7],
                                                        'diferencia' => $transaccion_para_actualizar->diferencia + $row[8]
                                                    ]);

        return new  PlantillaContable([
            'transacciones_id' => $row[0],
            'fecha_movimiento' => $row[1],
            'docReferencia' => $row[2],
            'puc_id'=> $row[3],
            'debito'=> $row[4],
            'credito'=> $row[5],
            'base'=>0
        ]);

    }
}
