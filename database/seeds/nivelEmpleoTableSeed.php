<?php

use Illuminate\Database\Seeder;
use App\NivelEmpleo;


class nivelEmpleoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NivelEmpleo::create(['nombre' => 'Nivel Directivo']);
        NivelEmpleo::create(['nombre' => 'Asesor']);
        NivelEmpleo::create(['nombre' => 'Profesional']);
        NivelEmpleo::create(['nombre' => 'Técnico']);
        NivelEmpleo::create(['nombre' => 'Asistencial']);
        NivelEmpleo::create(['nombre' => 'FALTANTE']);
    }
}
