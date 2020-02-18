<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PucsTableSeede::class);
        $this->call(codigoConceptoTableSeed::class);
        $this->call(codigoConceptoTableSeed::class);
        $this->call(RetencionesDescuentosTableSeed::class);
        $this->call(CentroCostoTableSeeder::class);
        $this->call(EntidadTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(CiudadesTableSeeder::class);
        $this->call(CiiuDescriptoresTableSeeder::class);
        $this->call(CiiuActividadesTableSeeder::class);
        $this->call(nivelEmpleoTableSeed::class);
        $this->call(CodigoEmpleoTableSeed::class);
        $this->call(RolestableSeedr::class);
        $this->call(UserTableSeed::class);
        $this->call(RolesUser::class);
        $this->call(TipoDocuemtoTableSeed::class);
        $this->call(empresaTableSeeder::class);
        $this->call(RegimenTableSeed::class);
        $this->call(TipoPersonaTableSeed::class);
        $this->call(FormatoDianTableSeed::class);
        $this->call(ConceptoDianTableSeed::class);
        $this->call(PrivilegiosPUCTableSeed::class);
        $this->call(FutExcedentesLiquidezTableSeed::class);
        $this->call(CodigoEntidadFinancieraSIATableSeed::class);
        $this->call(fuentes_financieras_SIATableSeed::class);
        $this->call(DependeciaTableSeeder::class);
        $this->call(AmbitosBienesTableSeed::class);
        $this->call(UnidadEjectuoraTableSeed::class);
        $this->call(CuentaMaestraTableSeed::class);
        $this->call(TipoCuentaTableSeed::class);
        $this->call(ComprobanteTableSeed::class);
        $this->call(TipoPresupuestoTableSeed::class);
        $this->call(codigoConceptoTableSeed::class);


    }
}
