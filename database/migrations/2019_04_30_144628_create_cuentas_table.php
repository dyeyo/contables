<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');

//            $table->('cod_cuenta');
//            $table->('nom_cuenta');
//            $table->('afectado');
//            $table->('banco');
//            $table->('nom_banco');
//            $table->('num_cuenta');
//            $table->('naturaleza');
//            $table->('corriente');
//            $table->('cta_maestra');
//            $table->('mercancias');
//            $table->('almacen');
//            $table->('terrenos');
//            $table->('gestion_activos');
//            $table->('base');
//            $table->('depreciable');
//            $table->('cartera');
//            $table->('cta_costo');
//            $table->('cta_gasto');
//            $table->('tipo_cuentab');
//            $table->('fuente_finan');
//            $table->('cod_entidfinan');
//            $table->('cta_maestrasalud');
//            $table->('estado');
//            $table->('fecha_inactiva');
//            $table->('fecha_creacion');
//            $table->('tipocuentas_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
}
