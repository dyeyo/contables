<?php

use Illuminate\Database\Seeder;
use App\TipoPresupuesto;

class TipoPresupuestoTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPresupuesto::create(['nombrePresupuesto'=>'Ingreso']);
        TipoPresupuesto::create(['nombrePresupuesto'=>'Gastos Vigencia']);
        TipoPresupuesto::create(['nombrePresupuesto'=>'Gastos Cuentas X Pagar']);
        TipoPresupuesto::create(['nombrePresupuesto'=>'Gastos Reserva']);
        TipoPresupuesto::create(['nombrePresupuesto'=>'Otras opciones']);
    }
}
