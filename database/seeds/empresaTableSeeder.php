<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class empresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre'=>'CREASIS',
            'nit'=>'1085941918',
            'dig_verificacion'=>'3',
            'codCgn'=>'123',
            'marco_normativo'=>'EMPRESA PUBLICA',
            'direccion'=>'IPIALES',
            'telefono'=>'7755558',
            'correo'=>'DYEGO@GMAIL.COM',
            'url'=>'fdsfds',
            'lema'=>'asdsa',
            'logo_republica'=>'asdsa',
            'logo_municipio'=>'asdsa',
            'logo_plandesarrollo'=>'asdsad',
            'num_ingresoinicial'=>12312,
            'num_ingresoactual'=>5645,
            'vigencia_cdp'=>'456',
            'id_ciudad'=>2,
            'id_departamento'=>2
        ]);
    }
}
