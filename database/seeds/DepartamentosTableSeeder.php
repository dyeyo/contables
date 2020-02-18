<?php

use Illuminate\Database\Seeder;
use App\Departamento;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nameDepartamento' =>'Antioquia', 'codigo'=>5]);
        Departamento::create(['nameDepartamento' =>'Atlántico', 'codigo'=>8]);
        Departamento::create(['nameDepartamento' =>'Bogotá, D.C', 'codigo'=>11]);
        Departamento::create(['nameDepartamento' =>'Bolívar', 'codigo'=>13]);
        Departamento::create(['nameDepartamento' =>'Boyacá', 'codigo'=>15]);
        Departamento::create(['nameDepartamento' =>'Caldas', 'codigo'=>17]);
        Departamento::create(['nameDepartamento' =>'Caquetá', 'codigo'=>18]);
        Departamento::create(['nameDepartamento' =>'Cauca', 'codigo'=>19]);
        Departamento::create(['nameDepartamento' =>'Cesar', 'codigo'=>20]);
        Departamento::create(['nameDepartamento' =>'Córdoba', 'codigo'=>23]);
        Departamento::create(['nameDepartamento' =>'Cundinamarca', 'codigo'=>25]);
        Departamento::create(['nameDepartamento' =>'Chocó', 'codigo'=>27]);
        Departamento::create(['nameDepartamento' =>'Huila', 'codigo'=>41]);
        Departamento::create(['nameDepartamento' =>'La guajira', 'codigo'=>44]);
        Departamento::create(['nameDepartamento' =>'Magdalena', 'codigo'=>47]);
        Departamento::create(['nameDepartamento' =>'Meta', 'codigo'=>50]);
        Departamento::create(['nameDepartamento' =>'Nariño', 'codigo'=>52]);
        Departamento::create(['nameDepartamento' =>'Norte de Santander', 'codigo'=>54]);
        Departamento::create(['nameDepartamento' =>'Quindío', 'codigo'=>63]);
        Departamento::create(['nameDepartamento' =>'Risaralda', 'codigo'=>66]);
        Departamento::create(['nameDepartamento' =>'Santander', 'codigo'=>68]);
        Departamento::create(['nameDepartamento' =>'Sucre', 'codigo'=>70]);
        Departamento::create(['nameDepartamento' =>'Tolima', 'codigo'=>73]);
        Departamento::create(['nameDepartamento' =>'Valle del cauca', 'codigo'=>76]);
        Departamento::create(['nameDepartamento' =>'Arauca', 'codigo'=>81]);
        Departamento::create(['nameDepartamento' =>'Casanare', 'codigo'=>85]);
        Departamento::create(['nameDepartamento' =>'Putumayo', 'codigo'=>86]);
        Departamento::create(['nameDepartamento' =>'Archipiélago de san andrés, providencia y santa catalina', 'codigo'=>88]);
        Departamento::create(['nameDepartamento' =>'Amazonas', 'codigo'=>91]);
        Departamento::create(['nameDepartamento' =>'Guainía', 'codigo'=>94]);
        Departamento::create(['nameDepartamento' =>'Guaviare', 'codigo'=>95]);
        Departamento::create(['nameDepartamento' =>'Vaupés', 'codigo'=>97]);
        Departamento::create(['nameDepartamento' =>'Vichada', 'codigo'=>99]);
        Departamento::create(['nameDepartamento' =>'FALTANTE', 'codigo'=>0000]);

    }
}
