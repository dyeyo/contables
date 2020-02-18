a<?php

use Illuminate\Database\Seeder;
use App\PrivilegiosPUC;
class PrivilegiosPUCTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Afectabe por Usuario']);
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Maneja Mercancias']);
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Almacén']);
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Farmacia']);
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Controla Terrenos']);
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Gestión Activos']);
        PrivilegiosPUC::create(['nombrePrivilegio' => 'Maneja Banco']);
        PrivilegiosPUC::create(['nombrePrivilegio' => '']);
    }
}
