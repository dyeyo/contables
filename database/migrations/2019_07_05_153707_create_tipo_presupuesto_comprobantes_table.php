<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPresupuestoComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_presupuesto_comprobantes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('comprobante_id')->unsigned()->nullable();
            $table->integer('tipoPresupuesto_id')->unsigned()->nullable();

            $table->foreign('comprobante_id')->references('id')->on('comprobantes');
            $table->foreign('tipoPresupuesto_id')->references('id')->on('tipo_presupuestos');

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
        Schema::dropIfExists('tipo_presupuesto_comprobantes');
    }
}
