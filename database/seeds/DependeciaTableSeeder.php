<?php

use Illuminate\Database\Seeder;
use App\Dependencia;

class DependeciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Dependencia::create(['id'=>999,'codigo' =>'0000', 'nombre'=>'SELECCIONE UNA DEPENDECIA']);
    }
}
