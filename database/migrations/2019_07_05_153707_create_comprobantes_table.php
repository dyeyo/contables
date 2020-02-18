<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('abreviatura',4)->nullable();
            $table->string('nombreSoporte')->nullable();
            $table->string('tesoreria')->nullable();
            $table->string('contabilidad')->nullable();
            $table->string('naturaleza')->nullable();
            $table->string('activarDescuentos')->nullable();
            $table->string('reporteSIA')->nullable();
            $table->string('estado')->nullable();

            $table->integer('empresa_id')->unsigned()->nullable();
            //$table->integer('tipoPresupuesto_id')->unsigned()->nullable();


            $table->foreign('empresa_id')->references('id')->on('empresas');
            //$table->foreign('tipoPresupuesto_id')->references('id')->on('tipo_presupuestos');

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
        Schema::dropIfExists('comprobantes');
    }
}
