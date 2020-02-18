<?php

use Illuminate\Database\Seeder;
use App\RetencionDescuentos;

class RetencionesDescuentosTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Cuotas de Administración',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Fondo de Solidaridad',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Fondo Rotatorio',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Libranzas',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Embargos Judiciales',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Aportes Laborales a Salud',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Aportes Laborales a Pensión',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Aportes Laborales al Fondo de Solidaridad Pensional',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Descuento en Compras',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Descuento en Ventas',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'Descuento por pronto pago',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'RetencionDescuentos Tributarios',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
        RetencionDescuentos::create([
            'anio'=>2019,
            'concepto'=>'RetencionDescuentos a intereses de Mora',
            'porcentaje'=>0.00,
            'base'=>0.00,
            'automatico'=>'NO',
            'activo'=>'NO',
            'RetoDes'=>"DESCUENTO",
            'codigo_id'=>1,
            'puc_id'=>1
        ]);
    }
}
