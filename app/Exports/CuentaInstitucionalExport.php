<?php

namespace App\Exports;

use App\CuentasInstitucionales;
use Maatwebsite\Excel\Concerns\FromCollection;

class CuentaInstitucionalExport implements FromCollection
{

    public function collection()
    {
        return CuentasInstitucionales::all();
    }
}
