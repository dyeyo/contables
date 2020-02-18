<?php

namespace App\Exports;

use App\CuentasInstitucionales;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class CuentasInstitucionalesExport implements FromCollection
{
    use Exportable;

    public function collection()
    {
        return CuentasInstitucionales::all();
    }
}
