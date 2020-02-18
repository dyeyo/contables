<?php

use Illuminate\Database\Seeder;
use App\CiiuDescriptores;

class CiiuDescriptoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CiiuDescriptores::create(['actividad'=>'Industrial']);
        CiiuDescriptores::create(['actividad'=>'Comercial']);
        CiiuDescriptores::create(['actividad'=>'Servicios']);
        CiiuDescriptores::create(['actividad'=>'Financiera']);
        CiiuDescriptores::create(['actividad'=>'FALTANTE']);
    }
}
